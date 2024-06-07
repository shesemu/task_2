<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
            ваших требований
        </div>
<?=$arResult["FORM_HEADER"]?>
</div>
<div class="contact-form__form">
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
            $for = "medicine_name";
            $class = "contact-form__form-inputs";
            $class_2 = "contact-form__input";
            $str = 'id="'. $for .'"';
            if ($arQuestion['STRUCTURE'][0]['ID'] == 1) {
                $for = "medicine_name";
            }
            if ($arQuestion['STRUCTURE'][0]['ID'] == 2) {
                $for = "medicine_company";
            }
            if ($arQuestion['STRUCTURE'][0]['ID'] == 3) {
                $for = "medicine_email";
            }
            if ($arQuestion['STRUCTURE'][0]['ID'] == 4) {
                $for = "medicine_phone";
            }
            if ($arQuestion['STRUCTURE'][0]['ID'] == 5) {
                $for = "medicine_message";
                $class = "contact-form__form-message";
                $class_2 = "input";
            }
	?>
            <div class="<?$class?>">
            <div class="<?$class?>"><label class="input__label" for="<?$for?>">
                <div class="input__label-text"><?=$arQuestion["CAPTION"]?></div>
                <div class="input__input" id="<?$for?>"><?=$arQuestion["HTML_CODE"]?></label></div>
                
                <?php continue;?>
                
		<tr>
			<td>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			</td>
			<td><?=$arQuestion["HTML_CODE"]?></td>
		</tr>
	<?
		}
	} //endwhile
	?>
    </div>
    </div>
    <div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
                </div>
        <input class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки"<?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="Оставить заявку" />
        
</div>
</div>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)