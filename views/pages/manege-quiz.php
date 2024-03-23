<div class="wrap">

    <?php 
    if(isset($errors)){
        foreach($errors as $error){
            echo "<div class='notice notice-error is-dismissible'><p>{$error['message']}</p></div>";
        }
    }
    ?>

	<h1 class="wp-heading-inline">Perguntas do quiz <?php echo $quiz->dados->title ?></h1> 

    <?php
        foreach($quiz->listQuestions() as $question){
        ?>
        <div class="question">
            <h2>
                Pergunta: <?php echo $question->dados->title ?> 
                <a onClick="jQuery('#editquestion<?php echo $question->dados->id; ?>').removeClass('d-none'); jQuery(this).addClass('d-none')" class="page-title-action">Editar</a>
                <a onClick="jQuery('#deletequestion<?php echo $question->dados->id; ?>').removeClass('d-none'); jQuery(this).addClass('d-none')" class="page-title-action delete">Excluir</a>
            </h2>
            <form method="post" name="deletequestion<?php echo $question->dados->id; ?>" id="deletequestion<?php echo $question->dados->id; ?>" class="validate d-none" novalidate="novalidate">
                <input name="action" type="hidden" value="deletequestion">
                <input name="question_id" type="hidden" value="<?php echo $question->dados->id; ?>">
                <p class="submit"><input type="submit" class="button button-primary" value="Tem certeza?"></p>
            </form>
            <div style="max-width:700px">
                <form method="post" name="editquestion<?php echo $question->dados->id; ?>" id="editquestion<?php echo $question->dados->id; ?>" class="validate d-none" novalidate="novalidate">
                    <input name="action" type="hidden" value="updatequestion">
                    <input name="question_id" type="hidden" value="<?php echo $question->dados->id; ?>">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr class="form-field form-required">
                                <th scope="row">
                                    <label for="edit_question_title<?php echo $question->dados->id; ?>">Titulo <span class="description">(Obrigatório)</span></label>
                                </th>
                                <td>
                                    <input name="title" type="text" id="edit_question_title<?php echo $question->dados->id; ?>" value="<?php echo $question->dados->title ?>">
                                </td>
                            </tr>
                            <tr class="form-field form-required">
                                <th scope="row"><label for="edit_question_description<?php echo $question->dados->id; ?>">Descrição</label></th>
                                <td><textarea name="description"  id="edit_question_description<?php echo $question->dados->id; ?>" value=""><?php echo $question->dados->description ?></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="submit"><input type="submit" class="button button-primary" value="Salvar"></p>
                </form>
            </div>
            <p><?php echo $question->dados->description ?></p>

            <h3>Opções</h3>
            <?php
                foreach($question->listOptions() as $option){
                ?>
                <div class="question">
                    <h4>
                        Opção: <?php echo $option->dados->title ?> 
                        <a onClick="jQuery('#editoption<?php echo $option->dados->id; ?>').removeClass('d-none'); jQuery(this).addClass('d-none')" class="page-title-action">Editar</a>
                        <a onClick="jQuery('#deleteption<?php echo $option->dados->id; ?>').removeClass('d-none'); jQuery(this).addClass('d-none')" class="page-title-action delete">Excluir</a>
                    </h4>
                    <form method="post" name="deleteption<?php echo $option->dados->id; ?>" id="deleteption<?php echo $option->dados->id; ?>" class="validate d-none" novalidate="novalidate">
                        <input name="action" type="hidden" value="deletequestionoption">
                        <input name="option_id" type="hidden" value="<?php echo $option->dados->id; ?>">
                        <p class="submit"><input type="submit" class="button button-primary" value="Tem certeza?"></p>
                    </form>
                    <div style="max-width:700px">
                        <form method="post" name="editoption<?php echo $option->dados->id; ?>" id="editoption<?php echo $option->dados->id; ?>" class="validate d-none" novalidate="novalidate">
                            <input name="action" type="hidden" value="updatequestionoption">
                            <input name="option_id" type="hidden" value="<?php echo $option->dados->id; ?>">
                            <table class="form-table" role="presentation">
                                <tbody>
                                    <tr class="form-field form-required">
                                        <th scope="row">
                                            <label for="edit_option_title<?php echo $option->dados->id; ?>">Titulo <span class="description">(Obrigatório)</span></label>
                                        </th>
                                        <td>
                                            <input name="title" type="text" id="edit_option_title<?php echo $option->dados->id; ?>" value="<?php echo $option->dados->title ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button button-primary" value="Salvar"></p>
                        </form>
                    </div>
                </div>
                <?php 
                } 
            ?>
            <div style="max-width:700px">
                <h2>Nova opção</h2> 
                <form method="post" name="newquestionoption" id="newquestionoption" class="validate" novalidate="novalidate">
                    <input name="action" type="hidden" value="newquestionoption">
                    <input name="question_id" type="hidden" value="<?php echo $question->dados->id; ?>">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr class="form-field form-required">
                                <th scope="row">
                                    <label for="new_option_title">Opção</label>
                                </th>
                                <td>
                                    <input name="title" type="text" id="new_option_title" value="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="submit"><input type="submit" class="button button-primary" value="Adicionar opção"></p>
                </form>
            </div>
        </div>
        <?php
        }
    ?>

    <div style="max-width:700px">
        <h2>Nova pergunta</h2> 
        <form method="post" name="newquestion" id="newquestion" class="validate" novalidate="novalidate">
            <input name="action" type="hidden" value="newquestion">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr class="form-field form-required">
                        <th scope="row">
                            <label for="new_question_title">Titulo <span class="description">(Obrigatório)</span></label>
                        </th>
                        <td>
                            <input name="title" type="text" id="new_question_title" value="">
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="new_question_description">Descrição</label></th>
                        <td><textarea name="description"  id="new_question_description" value=""></textarea></td>
                    </tr>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button button-primary" value="Adicionar pergunta"></p>
        </form>
    </div>

    <div class="clear"></div>
</div>
<style>
    .question{
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #fff;
    }
    .d-none{
        display: none;
    }
    .delete{
        color: #b32d2e !important;
        border-color: #b32d2e !important;
    }
</style>