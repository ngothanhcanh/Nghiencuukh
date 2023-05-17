<?php 
class App{
    protected $controller = 'User';
    protected $action = 'login';
    protected $params = [];
    public function __construct()
    {
        
        $arr = $this->UrlProcess();

        //controller xử lý url đầu tiên cotroller tồn tai
        if (isset($arr[0])) {
            if(file_exists('./app/mvc/Controllers/' . $arr[0] . '.php')) 
            {   // gán controller vừa nhập 
                $this->controller = $arr[0];   
            }
            unset($arr[0]);
        }
        // nguoc lại gán controller mặc định
        require_once './app/mvc/Controllers/'.$this->controller.'.php';
        // khởi tạo controller mới
        $this->controller = new $this->controller;
        
        //lọc actrion 
        if (isset($arr[1])) {
            //nếu action người dùng nhập tồn tại
            if (method_exists($this->controller, $arr[1])) {
                //gán action
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        //params
        //nếu tồn tại thì gán , ngược lại params = rỗng
        $this->params = $arr ? array_values($arr) : [];

        //khởi tạo class từ controller
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}

?>