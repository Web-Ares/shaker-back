<?php
/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 04.04.16
 * Time: 09:58
 */
?>

<div class="wrap">
    <h2>Curation Users (<?php $user_id = esc_sql($_REQUEST['user_id']); $user = get_user_by('id', $user_id); echo $user->display_name; ?>)</h2>

    <form name="users" action="/wp-admin/admin.php" method="get">
        <input type="hidden" name="page" value="curation_users">
        <select name="user_id" id="" onchange="submit();">
            <?php echo Curation_Plugin::getUsers(); ?>
        </select>
    </form>

    <div id="curations" data-user_id = "<?php echo esc_sql($_REQUEST['user_id']);?>" data-action="<?php echo admin_url('admin-ajax.php');?>">
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
                            <?php

                            echo  Curation_Plugin::getUserCategories($user_id);?>
                        </select>
                    </div>

                    <div class="categories__item categories__item-photos">
                        <h2>User Photos</h2>
                        <ul class="user_photos_list">
                         <?php Curation_Plugin::getUserPhotos(false,$user_id);?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <br class="clear">
        <a href="/wp-admin/users.php">Back to Users</a>
    </div>
</div>