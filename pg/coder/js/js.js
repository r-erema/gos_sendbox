$(function () {
	var config ={
		'profiz' : {
			mags : [
				{
					'code' : 'kr',
					'abbr' :'КР'
				},
				{
					'code' : 'sr',
					'abbr' :'СР'
				},
				{
					'code' : 'se',
					'abbr' :'СЭ'
				},
				{
					'code' : 'sec',
					'abbr' :'СЭК'
				},
				{
					'code' : 'peo',
					'abbr' :'ПЭО'
				},
				{
					'code' : 'eco',
					'abbr' :'ЭКО'
				}
			],
			addresseeForums : [
				{
					'name' : 'buhgalter-info.ru',
					'link' : 'http://buhgalter-info.ru/'
				},
				{
					'name' : 'kadrovik-info.ru',
					'link' : 'http://kadrovik-info.ru/'
				},
				{
					'name' : 'economist-info.ru',
					'link' : 'http://economist-info.ru/'
				},
				{
					'name' : 'sekretar-info.ru',
					'link' : 'http://sekretar-info.ru/'
				},
				{
					'name' : 'ecolog-info.ru',
					'link' : 'http://ecolog-info.ru/'
				}
			]
		}
	};

	$('#parser-select').on('change', function() {
		$('#profiz-mags-to-parse-buttons-panel').remove();
		$('#parse-form').empty().attr('name', $(this).val());
		switch($(this).val()) {
			case 'profizDigestParser' :
				$('#parse-form').append('<input type="hidden" value="' + $(this).val() + '" name="parserName">');
				$('#parse-form').addAdreseeForumButtons();
				$.each($(this).addProfizButtonsPanel().children(), function() {
					$(this).on('click', function () {
						$(this).attr('disabled', true);
						if($('#parse-form input[type=submit]').length == 0) {
							$('#parse-form').append('<input type="submit">');
						}
						$('#parse-form').addTextarea($(this).data('mag'));
						return false;
					})
				});
				break;
			default: $('#inf-message').text('Неизвестный select');
		}
	});

	$.prototype.addAdreseeForumButtons = function() {
		var div = $('<div id="addressee-forums-buttons">Форум получателей:<br /></div>');
		$.each(config.profiz.addresseeForums, function () {
			div.append('<input type="radio" name="addresseeForum" value="' + this.name + '">' + this.name + '<br />');
		});
		$(this).append(div);
		return div;
	};

	$.prototype.addProfizButtonsPanel = function() {
		var panel = $('<div id="profiz-mags-to-parse-buttons-panel"></div>');
		$.each(config.profiz.mags, function() {
			panel.append('<button id="add-' + this.code + '-textarea" data-mag="' + this.code + '">'+ this.abbr + '</button>');
		});
		$(this).after(panel);
		return panel;
	};

	$.prototype.addTextarea = function (id) {
		var textareaWrapper = $('<fieldset id="' + id + '-textarea-fieldset"></fieldset>');
		var removeTextareaLink = $('<a href="#" id="' + id + '-textarea-remover">Удалить</a>');
		removeTextareaLink.on('click', function () {
			$('#' + id + '-textarea-fieldset').remove();
			$('button#add-' + id + '-textarea').attr('disabled',false);
			if($('#parse-form').children().not('input[type=submit]').length == 1) {
				$('#parse-form input[type=submit]').remove();
			}
		});
		var textarea = $('<textarea id="' + id + '-parse-textarea" cols="70" rows="30" name=texts[' + id + ']>');
		textareaWrapper.append('<legend>' + id + '</legend>').append(textarea).append(removeTextareaLink);
		return textareaWrapper.appendTo($(this));
	}

});