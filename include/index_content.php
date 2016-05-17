
<content>
    <div class="container">
        <div class="row">
            <div class="block-content col-md-12 col-sm-12 col-xs-12">
                <div class="filter col-md-12 col-sm-12 col-xs-12">
                <p class="sort col-md-1">Сортировать:</p>
                <p class="no-sort col-md-2">Без сортировки</p>
                    <ul>
                        <li><a href="#">Не сотрировать</a></li>
                        <li><a href="#">От А до Я</a></li>
                        <li><a href="#">От дешовых к дорогим</a></li>
                        <li><a href="#">От дорогих к дешовым</a></li>
                        <li><a href="#">популярные</a></li>
                        <li><a href="#">новинки</a></li>
                    </ul>
                </div>
                <div class="product col-md-12">
                   <?php
                       include('include/products.php');
                   ?>
                </div>
            </div>
        </div>
    </div>
</content>