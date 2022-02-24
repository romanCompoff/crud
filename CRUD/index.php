<? include_once __DIR__ . DIRECTORY_SEPARATOR . 'CRUD.php';

// включается файл crud - набор функций обернутый в класс просто для удобства в файле CRUD.php

$crud = new CRUD;

//создается экземпляр класса круд 

// первые две строки везде одинаковые

// все функции вызываются у единственного обьекта (экземпляра) crud ( $crud->function() )


$links = $crud->readAll();

// у класса вызывается метод (функция readAll - извлечь все строки)

foreach($links as $link){

    echo "1. <a href = 'update.php?id={$link['id']}'>Update строку {$link['id']}</a>";
    echo '<br>';

}

//Циклом выводим все строки и делаем ссылки на обновление каждой строки 

echo "1. <a href = 'create.php'>Create</a>";

// ссылка на добавление строки

echo ". <a href = 'delete.php'>Delete</a>";

//ссылка на список строк для удаления