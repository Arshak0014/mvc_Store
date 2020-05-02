<?php

namespace application\components;


class Pagination
{
    public $limit;
    public $result_per_page;
    public $path;
    public $tableName;
    public $total;
    public $notes_on_page;

    public function __construct($path,$tableName,$result_per_page,$limit)
    {
        $this->path = $path;
        $this->tableName = $tableName;
        $this->result_per_page = $result_per_page;
        $this->limit = $limit;
    }



//    public function countOfPages($total,$notes_on_page)
//    {
//        return ceil($this->total / $this->notes_on_page);
//    }

    public function html()
    {
        $content = '';

        $db = Db::getConnection();
        $data = $db->query("SELECT * FROM $this->tableName ORDER BY id DESC");
        $data->execute();
        $categoryList = $data->fetchAll(\PDO::FETCH_ASSOC);

        $number_of_results = count($categoryList);

        $number_of_pages = ceil($number_of_results / $this->result_per_page);

        $page = Router::getPage();

//        $this_page_first_result = ($page - 1) * $this->result_per_page;

        if ($page > 1) {
            echo '<a class="pagi" href="'.$this->path.($page - 1).'">⏪</a>';
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($number_of_pages > 1) {
                $cl = 'pagi';
                if ($page == $i){
                    $cl = 'main_active';
                }

                echo '<a class='.$cl.' href="'.$this->path.$i.'">'.$i.'</a>';

            }
        }

        if ($page < $i - 1) {
            echo '<a class="pagi" href="'.$this->path.($page + 1).'">⏩</a>';
        }

        return $content;

    }

}