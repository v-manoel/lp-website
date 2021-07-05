<?php 

require_once __DIR__."/../model/negocio/Order.php";
require_once __DIR__."/../model/negocio/Employee.php";
require_once __DIR__."/../model/negocio/Department.php";
require_once __DIR__."/../model/negocio/Preparation.php";
require_once __DIR__."/../model/negocio/Check.php";
require_once __DIR__."/../model/negocio/Delivery.php";

class ControllerDepartment extends Render{

    private $requested_page;
    private ?Employee $employee = null;
    private Department $department;

    public function __construct(){

        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Páginas de gerenciamento interno das atividades da empresa");
        $this->setKeywords("deparment, management, employees, stats");
        $this->setDir("department");
        if(!(isset($_SESSION['employee']))){
            $this->page("login");
            
        }else{
            $this->employee = unserialize($_SESSION['employee']);
        }
        
    }

    public function __destruct()
    {
        if($this->employee)
            $_SESSION['employee'] = serialize($this->employee);
    }

    public function page($page){
        //Render internal page
        switch (ucfirst($page)) {
            case "Login":
                $this->requested_page = "Login";
                break;
            case "Menu":
                $this->requested_page = "Menu";
                break; 
            case "Teste":
                $this->requested_page = "Conferencia";
                break;
            case "Pedidos":
                $this->LoadAllOrders();
                $this->requested_page = "Pedidos";
                break;           
            default:
                $this->requested_page = "Menu";
                break;
        }

        $this->renderLayout();
    }


    public function renderLayout(){
        require_once(DIRREQ."app/view/Tablet.php");
    }

    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php")){
            require(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php");
        }
        
    }

    public function CurrentOrder(){

        if(isset($_SESSION['dep-order'])){
            $this->content['order'] = unserialize($_SESSION['dep-order']);
            $this->content['status'] = array_reverse(OrderStatus::allByOrder($this->content['order']));
            
            if($this->employee->getDepartment() == "Gerente"){
                switch (ucfirst($this->content['order']->getStatus()->getStatus())) {
                    case 'Paid':
                        $this->requested_page = "Preparacao";
                        break;
                    case 'Prepared':
                        $this->requested_page = "Conferencia";
                        break;
                    case 'Checked':
                        $this->requested_page = "Entrega";
                        break;
                    case 'Delivered':
                        $this->requested_page = "Entrega";
                        break;                   

                }
            }else{
                $this->requested_page = $this->employee->getDepartment();
            }
            $this->renderLayout();
        }else{
            $dest_page = DIRPAGE.'department/page/menu';
            $this->messagePage("Selecione um pedido primeiro !",$dest_page,true );
        }

    }

    public function SetEmployeeOrder()
    {
        if(isset($_POST['order-id']) && !isset($_SESSION['dep-order'])){
            $order = new Order();
            $order->setId($_POST['order-id']);
            if($order->findByID()){
                $_SESSION['dep-order'] = serialize($order);
                header('Location:'.DIRPAGE.'department/page/menu', true,302);
            }
        }else{
            header('Location:'.DIRPAGE.'department/page/pedidos', true,302);
        }
    }

    public function LoadAllOrders(){
        $order = new Order();
        $this->content['orders'] = $order->all();
    }

    public function SortOrder()
    {
        $order = new Order();
        $this->content['orders'] = $this->employee->OrdersByMyDep($order->all());
        $this->requested_page = "Pedidos";
        $this->renderLayout();
    }



    public function Logar(){
        if(isset($_POST['email']) && isset($_POST['pswd'])){
            $employee = new Employee();
            $employee->setEmail($_POST['email']);
            $employee->setPswd($_POST['pswd']);
            
            if($employee->checkCredentials()){
                $this->employee = $employee;
                $dest_page = DIRPAGE.'department/page/menu';
                $this->messagePage("Bom trabalho ".$this->employee->NamePieces()[0]." !",$dest_page,true);
            
            }else{
                $dest_page = DIRPAGE.'department';
                $this->messagePage("Senha ou Email incorretos !",$dest_page,false );
            }
        }else{
            
        }

    }

    public function Logout(){
        if(isset($_SESSION['employee']))
        {
            if(isset($_SESSION['dep-order']))
                unset($_SESSION['dep-order']);    
            unset($_SESSION['employee']);
            $this->employee = null;
            header('Location:'.DIRPAGE.'department', true,302);
        }
    }

    public function Prepare(){
        if(isset($_SESSION['dep-order']) && $this->employee->WorksIn("Preparacao") && isset($_POST['prepare-button'])){
            $preparation = new Preparation();
            //Update items storaged qnty
            foreach ($_POST['stored'] as $key => $value) {
                $item = new Item();
                $product = new Product();
                $product->setId($key);
                $item->setProduct($product);
                $item->setOrder(unserialize($_SESSION['dep-order']));
                if($item->findByID()){
                    $preparation->storagedItemQnty($item,$value);
                }
            }
                $this->NextOrderStep($preparation);
        
        }
    }

    public function Check(){
        if(isset($_SESSION['dep-order']) && $this->employee->WorksIn("Conferencia")){
            $check = new Check();
            $order = unserialize($_SESSION['dep-order']);
            if(isset($_POST['toBack']) && !$check->checkOrderDisponibility($order)){
                $order = unserialize($_SESSION['dep-order']);
                $start = $order->getStatus()->getUpdate_time();
                $start = strtotime($start);
                //End point of our date range.
                $end = strtotime("+30 day", $start);
                //Custom range.
                $date = mt_rand($start, $end);
                $date = date("Y-m-d H:i:s", $date);
                $check->ToBefore_Department($this->employee,$order,$date);
                unset($_SESSION['dep-order']);
                header('Location:'.DIRPAGE.'department/page/menu', true,302);
            }else{
                $this->NextOrderStep($check);
            }
        }
    }

    public  function Delivery()
    {
        if(isset($_SESSION['dep-order']) && $this->employee->WorksIn("Entrega")){
            $delivery = new Delivery();
            $this->NextOrderStep($delivery);
        }
    }

    protected function NextOrderStep(Department $department){
        //Gen a random date based on atual status date
        if(isset($_SESSION['dep-order'])){
            $order = unserialize($_SESSION['dep-order']);
            $start = $order->getStatus()->getUpdate_time();
            $start = strtotime($start);
            //End point of our date range.
            $end = strtotime("+30 day", $start);
            //Custom range.
            $date = mt_rand($start, $end);
            $date = date("Y-m-d H:i:s", $date);

            $department->ToNext_Department($this->employee,$order,$date);
            unset($_SESSION['dep-order']);
            header('Location:'.DIRPAGE.'department/page/menu', true,302);
        }

    }

}