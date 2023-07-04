<?php 
    function getAllParentCategories($categories, $category_id) {
        $parents = array();
    
        // Tìm danh mục con với category_id cụ thể
        foreach ($categories as $category) {
            if ($category['id'] == $category_id) {
                // Thêm danh mục cha vào danh sách
                $parents[] = $category;
    
                // Nếu danh mục cha có parent_id khác 0, tiếp tục tìm danh mục cha của nó
                if ($category['parent_id'] != 0) {
                    $parents = array_merge($parents, getAllParentCategories($categories, $category['parent_id']));
                }
    
                break;
            }
        }
        return $parents;
    }
    $categories = [];
    $getAllCate = $cat->getListCategory_FE();
    while($row = $getAllCate->fetch_assoc()) {
        $categories[] = $row;
    }
    $parentCategories = getAllParentCategories($categories, $catId);
    // Hiển thị danh sách danh mục cha
    $parentCategories = array_reverse($parentCategories);
    foreach ($parentCategories as $parentCategory) {
        echo "<li class='content__menu-item'>
                <span class='content__menu-item-separate'></span>
                <a class='content__menu-item-name' href='category.php?catid=".$parentCategory['id']."'>".$parentCategory['categoryName']."</a>
            </li>";
    }
?>