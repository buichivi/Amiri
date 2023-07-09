<?php 
    function has_child($data, $id) {
        foreach($data as $v) {
            if($v['parent_id'] == $id) {
                return true;
            }
        }
        return false;
    }
    function render_menu($data, $parent_id = 0, $level = 0)
    {
        if ($level == 0) {
            $result = "<ul class='menu__list'>";
        }
        if ($level == 1) {
            $result = "<ul class='list-submenu'>";
        }
        if ($level == 2) {
            $result = "<ul class='db-submenu'>";
        }
        foreach($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $result .= "<li>";
                $result .= "<a href='category.php?catid=".$item['id']."'>".$item['categoryName']."</a>";
                if (has_child($data, $item['id'])) {
                    $result .= render_menu($data, $item['id'], $level + 1);
                }
                $result .= "</li>";
            }
        }
        if ($level == 0) {
            $result .= "
                    <li class=''><a href='about_us.php'>Bộ sưu tập</a></li>
                    <li class='ps-relative'><a href='about_us.php'>Về chúng tôi</a></li>
            ";
        }
        $result .= "</ul>";
        return $result;
    }
    $cateList = $cat->getListCategory_FE();
    $loadCate = array();

    while($row = $cateList->fetch_assoc()) {
        $loadCate[] = $row;
    }
    // print_r($loadCate);
    // foreach ($loadCate as $category) {
    //     displayCategory($category);
    // }
    echo render_menu($loadCate);
?>
