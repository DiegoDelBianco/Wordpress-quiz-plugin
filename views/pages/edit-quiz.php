<div class="wrap-quiz">

    <?php 
    if(isset($errors)){
        foreach($errors as $error){
            echo "<div class='notice notice-error is-dismissible'><p>{$error['message']}</p></div>";
        }
    }
    ?>

    <h1 id="add-new-user">Editar quiz</h1>


    <div id="ajax-response"></div>

    <p>Edite o Quiz.</p>
    <form method="post" name="updatequiz" id="updatequiz" class="validate" novalidate="novalidate">
        <input name="action" type="hidden" value="updatequiz">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="quiz_title">Titulo <span class="description">(Obrigatório)</span></label>
                    </th>
                    <td>
                        <input name="quiz_title" type="text" id="quiz_title" value="<?php echo $quiz->dados->title; ?>">
                    </td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="description">Descrição</label></th>
                    <td><textarea name="description"  id="description" value=""><?php echo $quiz->dados->description?></textarea></td>
                </tr>
                <tr class="form-field">
                    <th scope="row"><label for="final_link">Link final </label></th>
                    <td><input name="final_link" type="text" id="final_link" value="<?php echo $quiz->dados->final_link?>"></td>
                </tr>
            </tbody>
        </table>
	    <p class="submit"><input type="submit" class="button button-primary" value="Salvar quiz"></p>
    </form>
</div>
<style>
    .wrap-quiz {
        max-width: 700px;
    }
</style>