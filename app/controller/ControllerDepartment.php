<?php 


require_once __DIR__."/../model/negocio/Order.php";
require_once __DIR__."/../model/negocio/Employee.php";

class ControllerDepartment extends Render{

    private $requested_page;
    private ?Employee $employee = null;

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
            case "Preparacao":
                $this->requested_page = "Preparacao";
                break;
            case "Conferencia":
                $this->requested_page = "Conferencia";
                break;
            case "Entrega":
                $this->requested_page = "Entrega";
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

    public function LoadAllOrders(){
        $order = new Order();
        $this->content['orders'] = $order->all();
    }


    public function Logar(){
        if(isset($_POST['email']) && isset($_POST['pswd'])){
            $employee = new Employee();
            $employee->setEmail($_POST['email']);
            $employee->setPswd($_POST['pswd']);
            
            if($employee->checkCredentials()){
                $this->employee = $employee;
                $dest_page = DIRPAGE.'department/page/menu';
                $this->messagePage("Bom trabalho".$this->employee->NamePieces()[0]." !",$dest_page,true);
            
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
            unset($_SESSION['employee']);
            $this->employee = null;
            header('Location:'.DIRPAGE.'department', true,302);
        }
    }

}