<div class="content">
    <h1>Latest ads</h1>
    <div class="category-filter">
        <form action="index.php" method="GET">
            Category:
            <input type="hidden" name="page" value="filter"/>
            <select name="category_id">
                <option value="0">All categories</option>
                <?php
                foreach($categoriesModel->getAll() as $category) {
                ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                <?php
                }
                ?>
            </select>  
            <input type="submit" value="Show"/>      
        </form>
    </div>
    <?php
    foreach($ads as $ad) {
    ?>
    <div class="ad">
        <div class="ad-content">
            <div class="ad-photo">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">
                <?php
                if(empty($ad['fileName'])) {
                ?>
                    <img src="public/img/camera.png"/>
                <?php
                } else {
                ?>
                    <img src="upload/<?php echo $ad['fileName']?>"/>
                <?php
                } 
                ?>
                </a>
            </div>
            <div class="ad-text">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">                
                    <?php echo $ad['description']?>
                </a>
                <?php 
                if($securityService->isLoggedIn() && $securityService->isAdmin()) {
                ?>
                &nbsp;&nbsp;[<a href="index.php?page=delete-ad&id=<?php echo $ad['id']?>" style="color: red">Delete</a>]
                <?php } ?>
            </div>
        </div>
        <div class="ad-phone">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">       
                    <?php echo $ad['phone_number']?>      
                </a>
        </div>                  
	</div>
    <?php
    }
    ?>
</div>
