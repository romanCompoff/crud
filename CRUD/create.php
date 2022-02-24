<? include_once __DIR__ . DIRECTORY_SEPARATOR . 'CRUD.php';


$crud = new CRUD;

if($_POST && $_POST != ''){
    
    $crud->create($_POST);

}

//если пришли данные с формы, то добавляем их (передаем функции create)
?>
<form action="create.php" method="post">
    <input type="text" name="param1">
    <input type="text" name="param2">
    <input type="text" name="param3">
    <input type="submit">
</form>

<?php
// выводим список всех строк
$all = $crud->readAll();

foreach($all as $data){
    echo '1. ';
    foreach ($data as $element){
        echo $element;
        echo ' | ';
    }
    echo '<br>';
}
?>