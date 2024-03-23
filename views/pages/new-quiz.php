<div class="wrap-quiz">

    <?php 
    if(isset($errors)){
        foreach($errors as $error){
            echo "<div class='notice notice-error is-dismissible'><p>{$error['message']}</p></div>";
        }
    }
    ?>

    <h1 id="add-new-user">Novo quiz</h1>


    <div id="ajax-response"></div>

    <p>Crie um novo Quiz.</p>
    <form method="post" name="createquiz" id="createquiz" class="validate" novalidate="novalidate">
        <input name="action" type="hidden" value="createquiz">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="quiz_title">Titulo <span class="description">(Obrigatório)</span></label>
                    </th>
                    <td>
                        <input name="quiz_title" type="text" id="quiz_title" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60">
                    </td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="description">Descrição</label></th>
                    <td><textarea name="description"  id="description" value=""></textarea></td>
                </tr>
                <tr class="form-field">
                    <th scope="row"><label for="first_name">Template (Você pode editar o código depois)</label></th>
                    <td>
                        <select name="template" type="text" id="template" value="">
                            <?php foreach(wpqp_get_templates_list() as $key => $value): ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr class="form-field">
                    <th scope="row"><label for="final_link">Link final </label></th>
                    <td><input name="final_link" type="text" id="final_link" value=""></td>
                </tr>
            </tbody>
        </table>
	    <p class="submit"><input type="submit" class="button button-primary" value="Adicionar quiz"></p>
    </form>
</div>
<style>
    .wrap-quiz {
        max-width: 700px;
    }
</style>