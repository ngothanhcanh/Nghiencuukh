<?php
class AdminIndexController extends Controller
{  
    public function __construct()
    {
        
    }
    public function index()
    {
       $this->view('admin/index');
    }
}

?>