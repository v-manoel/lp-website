<?php 

require_once __DIR__."/../model/negocio/Order.php";
require_once __DIR__."/../model/negocio/OrderStatus.php";
require_once __DIR__."/../model/negocio/Stats.php";

class ControllerManager extends Render{

    private $requested_page;
    private ?Stats $stats;

    public function __construct(){

        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Páginas de gerenciamento interno das atividades da empresa");
        $this->setKeywords("deparment, management, employees, stats");
        $this->setDir("manager");
        if(!(isset($_SESSION['employee'])) || unserialize($_SESSION['employee'])->getDepartment() != "Gerente"){
            header('Location:'.DIRPAGE.'department/page/login', true,302);
        }else{
            $this->employee = unserialize($_SESSION['employee']);
            $this->stats = new Stats();
        }
    }

    public function page($page = "")
    {
        switch (ucfirst($page)) {
            case 'Clients':
                $this->LoadClientStats();
                $this->requested_page = "DadosClientes";
                break;
            case 'Products':
                $this->LoadProductStats();
                $this->requested_page = "DadosProdutos";
                break;
            case 'Sectors':
                $this->LoadDepartmentStats();
                $this->requested_page = "DadosSetores";
                break;
            case 'Home':
                $this->LoadHomeStats();
                $this->requested_page = "Home";
                break;
            default:
            header('Location:'.DIRPAGE.'department/page/menu', true,302);
                break;
        }

        $this->renderLayout();
    }

    public function renderLayout(){
        require_once(DIRREQ."app/view/Dashboard.php");
    }

    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php")){
            require(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php");
        }
        
    }

    public function Teste(){
  
        $result = $this->stats->ProductsParticipation();
        var_dump($result);
    }

    private function LoadHomeStats(){
        $this->content['districts-rechead'] = count($this->stats->totalOrdersByDistricts());
        $this->content['orders-price'] = $this->stats->totalOrdersPrice();
        $this->content['orders-qnty'] = $this->stats->totalOrdersQnty();
        $this->content['categories-qnty'] = $this->stats->totalOrdersByCategory();
        $this->content['categories-price'] = $this->stats->totalSalesByCategory();
    }

    private function LoadClientStats(){
        $this->content['customer-stats'] = $this->stats->LoadCustomerStats();
    }

    private function LoadDepartmentStats(){
        $this->content['employees-stats'] = $this->stats->LoadEmployeeStats();
    }

    private function LoadProductStats(){
        $this->content['products-stats'] = $this->stats->LoadProductStats();
    }

    public function AjaxCharts(){
        
        if(isset($_POST["chart"])){
            switch ($_POST["chart"]) {
                case 'sales-qnty':
                    $result = $this->stats->totalOrdersByDate();
                    $result = json_encode($result);
                    echo $result;
                    break;

                case 'dep-time':
                    $result = $this->stats->totalAttendanceTimeByDepartments();
                    $result = json_encode($result);
                    echo $result;
                    break;
                case 'dist-qnty':
                    $result = $this->stats->totalSalesByDistricts();
                    $result = json_encode($result);
                    echo $result;
                    break;
                case 'customer-sales':
                    $result = $this->stats->CustomerOrdersQnty();
                    $result = json_encode($result);
                    echo $result;
                    break;
                case 'prods-participation':
                    $result = $this->stats->ProductsParticipation();
                    $result = json_encode($result);
                    echo $result;
                    break;    
                case 'prods-sales':
                    $result = $this->stats->ProductsSales();
                    $result = json_encode($result);
                    echo $result;
                    break;                           

            }
            
        }
    }
}