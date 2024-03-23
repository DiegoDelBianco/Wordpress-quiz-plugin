<div class="wrap-quiz">

    <?php 
    if(isset($errors)){
        foreach($errors as $error){
            echo "<div class='notice notice-error is-dismissible'><p>{$error['message']}</p></div>";
        }
    }
    ?>

    <h1 id="add-new-user">Editar HTML do quiz</h1>


    <div id="ajax-response"></div>

    <p>Edite o layout.</p>
    <form method="post" name="updatehtml" id="updatehtml" class="validate" novalidate="novalidate">
        <input name="action" type="hidden" value="updatehtml">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field form-required">
                    <th scope="row"><label for="layout_html">Layout geral</label></th>
                    <td><textarea name="layout_html"  id="layout_html" value=""><?php echo str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_html)); ?></textarea></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="layout_question_html">Layout de perguntas</label></th>
                    <td><textarea name="layout_question_html"  id="layout_question_html" value=""><?php echo str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_question_html)); ?></textarea></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="layout_question_option_html">Layout de opções</label></th>
                    <td><textarea name="layout_question_option_html"  id="layout_question_option_html" value=""><?php echo str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_question_option_html)); ?></textarea></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="layout_css">CSS</label></th>
                    <td><textarea name="layout_css"  id="layout_css" value=""><?php echo str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_css)); ?></textarea></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row"><label for="layout_js">Javascript</label></th>
                    <td><textarea name="layout_js"  id="layout_js" value=""><?php echo str_replace("\'", "'", str_replace('\"', '"', $quiz->dados->layout_js)); ?></textarea></td>
                </tr>
            </tbody>
        </table>
	    <p class="submit"><input type="submit" class="button button-primary" value="Salvar quiz"></p>
    </form>
</div>
<style>
    textarea{
        height: 400px;
    }
</style>