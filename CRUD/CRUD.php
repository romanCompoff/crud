<?php


class CRUD
{
    protected $table = 'testTable';
    protected $db;

    //функция вызывается при создании класса - сразу получаем подключение к БД
    public function __construct()
    {
        $this->db = $this->getConnect();
    }

    // Функиция подключается к бд и возвращает обьект PDO
    public function getConnect()
    {
        $dsn = sprintf('%s:host=%s;dbname=%s;charset=UTF8', 'mysql', 'localhost', 'test');
		$opt = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        	\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
		return new \PDO($dsn, 'root', 'root', $opt);
    }

    // Функция для перевода массива в строку для sql запрос create
    protected function extractArrayToInsert($array)
    {
        $str1;
        $str2;

        foreach ($array as $key => $a) {

            $str1 .= $key . ", ";
            $str2 .= ":" . $key . ", ";

        }

        if (substr($str1, -2) == ', ') {

            $str1 = substr($str1, 0, -2);

        }
        if (substr($str2, -2) == ', ') {

            $str2 = substr($str2, 0, -2);

        }

        return [$str1, $str2];

    }

    // Служебная функция - выводит массив в более удобном для чтения виде и убивает скрипт
    public function dd($data = false)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;
    }

    public function create($post)
    {
        $data = $this->extractArrayToInsert($post);
        $sql = sprintf("INSERT INTO %s ($data[0]) VALUES ($data[1])", $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($post);

        return $this->stmt;
    }

    public function readOne($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id ', $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }


    public function readAll()
    {
		$sql = sprintf('SELECT * FROM %s', $this->table);
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
	 }

    public function delete($id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = :id', $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

    }

    public function update($post)
    {
        $string = $this->ectractArrayToUpdate($post);

        $sql = sprintf("UPDATE %s SET $string[0] WHERE id = :$string[1]", $this->table);
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute($post);
   
    }
    // извлечение данных для апдейта из массива и перевод в нужные строки для sql запроса
    protected function ectractArrayToUpdate($post)
    {
        $str = '';
        $id = '';

        foreach($post as $key => $data){
            if($key == 'id'){ 
                $id = $key;
                continue;
            }
            $str .= "{$key} = :{$key}, ";
        }

        if (substr($str, -2) == ', ') {

            $str = substr($str, 0, -2);

        }

        return [$str, $id];
    }

 


}
