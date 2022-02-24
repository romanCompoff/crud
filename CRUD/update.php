<? include_once __DIR__ . DIRECTORY_SEPARATOR . 'CRUD.php';

$crud = new CRUD;

if((!$_GET['id'] || $_GET['id'] == '') && !$_POST ){
    $crud->dd('Не выбран элемент');
}

//проверяем, что передан id , который ужно обновить


if($_POST && $_POST != ''){
    
    $crud->update($_POST);
}

//если пришли данные из формы, отдаем их функции апдейт

$oldData = $crud->readOne($_GET['id']);

//функция readOne извлекает данные строки по id
// ниже вставляем извлеченные данные в поля формы , чтобы форма была не пустая при открытии

?>
<form action="update.php" method="post">
    <input type="text" disabled value = '<?= $oldData['id']?>'>
    <input type="hidden" name = "id" value = '<?= $oldData['id']?>'>
    <input type="text" name="param1" value = '<?= $oldData['param1']?>'>
    <input type="text" name="param2" value = '<?= $oldData['param2']?>'>
    <input type="text" name="param3" value = '<?= $oldData['param3']?>'>
    <input type="submit">
</form>