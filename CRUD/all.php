<? include_once __DIR__ . DIRECTORY_SEPARATOR . 'CRUD.php';

$crud = new CRUD;

$all = $crud->readAll();

foreach($all as $data){
    echo '1. ';
    foreach ($data as $element){
        echo $element;
        echo ' | ';
    }
    echo '<br>';
}