<?php
/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 04.04.16
 * Time: 09:58
 */
?>

<div class="wrap">
    <h2>Limited Images for all Users</h2>

    <div id="curations" data-user_id = "0" data-action="<?php echo admin_url('admin-ajax.php');?>">
        <div id="post-body" class="metabox-holder">
            <div id="post-body-content">
                <div class="categories">

                    <div class="categories__item">
                        <h2>Artists</h2>
                        <select size="1" multiple class="curation_artists" name="artists[]">
                          <?php echo  Curation_Plugin::get_Authors(0);?>
                        </select>
                    </div>

                    <div class="categories__item">
                        <h2>Categories</h2>
                        <select size="1" multiple class="curation_categories" name="categories[]">
                            <?php echo  Curation_Plugin::get_Categories(0);?>
                        </select>
                    </div>

                    <div class="categories__item">
                        <h2>Subcategories</h2>
                        <select size="3" multiple class="curation_subcategories" name="subcategories[]">

                        </select>
                    </div>

                    <div class="categories__item categories__item-photos ">
                        <h2>Photos</h2>
                        <select size="3" multiple class="curation_photos" name="photos[]">

                        </select>
                        <button class="add_to_users">Add to user</button>
                    </div>

                </div>
                <div class="categories">
                    <div class="categories__item">
                        <h2>User categories</h2>

                        <select size="3" multiple class="user_categories" name="user_categories[]">
                            <?php echo Curation_Plugin::getUserCategories(0);?>
                        </select>
                    </div>

                    <div class="categories__item categories__item-photos">
                        <h2>User Photos</h2>
                        <ul class="user_photos_list">
                         <?php Curation_Plugin::getUserPhotos(false);?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <br class="clear">
        <a href="/wp-admin/users.php">Back to Users</a>
    </div>
</div>