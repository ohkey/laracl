<?php
namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class FormController extends Controller
{
    // 对应的模型
    protected $model;
    
    // 所有的字段
    protected $fields_all;
    
    // 列表页显示的字段
    protected $fields_show;
    
    // 编辑页面显示的字段
    protected $fields_edit;
    
    // 创建页面显示的字段
    protected $fields_create;
    
    public function __construct() {
        $route = Route::currentRouteAction();
        list($this->controller, $action) = explode('@', $route);
        View::share('controller', $this->controller);
        
        $fields_show = array();
        foreach ($this->fields_show as $field) {
            $fields_show[$field] = $this->fields_all[$field];
        }
        View::share('fields_show', $fields_show);
        
        $fields_edit = array();
        foreach ($this->fields_edit as $field) {
            $fields_edit[$field] = $this->fields_all[$field];
        }
        View::share('fields_edit', $fields_edit);
        
        $fields_create = array();
        foreach ($this->fields_create as $field) {
            $fields_create[$field] = $this->fields_all[$field];
        }
        View::share('fields_create', $fields_create);
        
        View::share('input', Input::all());
    }
    
    public function index() {
        $model = new $this->model;
        $builder = $model->orderBy('id', 'desc');
        
        $input = Input::all();
        foreach ($input as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (!isset($this->fields_all[$field])) {
                continue;
            }
            $search = $this->fields_all[$field];
            $builder->whereRaw($search['search'], [$value]);
        }
        $models = $builder->paginate(20);
        
        return View::make('form.index', [
            'models' => $models,
        ]);
    }
    
    public function create() {
        return View::make('form.create', []);
    }
    
    public function store() {
        $model = new $this->model;
        $model->fill(Input::all());
        $model->save();
        return Redirect::to(action($this->controller . '@index'));
    }
    
    public function edit($id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        return View::make('form.edit', compact('model'));
    }
 
    public function update($id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        $model->fill(Input::all());
        $model->save();
        
        return Redirect::to(action($this->controller . '@index'));
    }
 
    public function destroy($id)
    {
        $model = new $this->model;
        $model->destroy($id);
        
        return Redirect::to(action($this->controller . '@index'));
    }
}