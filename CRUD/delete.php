<? include_once __DIR__ . DIRECTORY_SEPARATOR . 'CRUD.php';

$crud = new CRUD;

if($_GET['id'] && $_GET['id'] !== '' ){
    $crud->delete($_GET['id']);
}

$links = $crud->readAll();
//получаем строки

foreach($links as $link){
    echo " <a href = 'delete.php?id={$link['id']}'>Delete строку {$link['id']}</a>";
    echo '<br>';
}
//генерируем ссылки на удаление любой строки - выводим циклом

foreach($links as $data){
    echo '1. ';
    foreach ($data as $element){
        echo $element;
        echo ' | ';
    }
    echo '<br>';
}

//выводим список всех строк циклом