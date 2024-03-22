<div class="wrap">

    <?php 
    if(isset($errors)){
        foreach($errors as $error){
            echo "<div class='notice notice-error is-dismissible'><p>{$error['message']}</p></div>";
        }
    }
    ?>

	<h1 class="wp-heading-inline">Wordpress quiz plugin</h1> <a href="<?php echo wpqp_get_url('wpqp-novo-quiz'); ?>" class="page-title-action">Novo quiz</a>

<form method="get">
    
    <table class="wp-list-table widefat fixed striped table-view-list users">
	    <thead>
            <tr>
                <td id="cb" class="manage-column column-cb check-column">
                    <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                    <input id="cb-select-all-1" type="checkbox">
                </td>
                <th scope="col" id="name" class="manage-column column-name">
                    Name
                </th>	
                <th scope="col" id="name" class="manage-column column-name">
                    Description
                </th>	
            </tr>
        </thead>

        <tbody id="the-list" data-wp-lists="list:user">
            <?php foreach($list_quiz as $quiz){?>
            <tr id="quiz-<?php echo $quiz->id; ?>">
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="user_2">Select <?php echo $quiz->title; ?></label>
                    <input type="checkbox" name="users[]" id="user_<?php echo $quiz->id; ?>" class="editor" value="2">
                </th>
                <td class=" has-row-actions column-primary" data-colname="title">
                    <strong><a href="#"><?php echo $quiz->title; ?></a></strong><br>
                    <div class="row-actions visible" style="left: 0">
                        <span class="edit"><a href="<?php echo wpqp_get_url('wpqp-editar-quiz'); ?>&id=<?php echo $quiz->id; ?>">Editar</a> | </span>
                        <!--span class="delete"><a class="submitdelete" href="#">Delete</a> | </span-->
                        <span class="view"><a href="<?php echo wpqp_get_url('wpqp-quiz-perguntas'); ?>&id=<?php echo $quiz->id; ?>">Perguntas</a></span>
                    </div>
                </td>
                <td class="name column-name"><?php echo $quiz->description; ?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</form>

<div class="clear"></div>
</div>