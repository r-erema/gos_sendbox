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
			]
		}
	};

	$('#parser-select').on('change', function() {
		$('#profiz-mags-to-parse-buttons-panel').remove();
		$('#parse-form').empty().attr('name', $(this).val());
		switch($(this).val()) {
			case 'profizDigestParser' :
				$('#parse-form').append('<input type="hidden" value="' + $(this).val() + '" name="parserName">')
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
			if($('#parse-form :not(input[type=submit])').length == 0) {
				$('#parse-form input[type=submit]').remove();
			}
		});
		var textarea = $('<textarea id="' + id + '-parse-textarea" cols="70" rows="30" name=texts[' + id + ']>');
		textareaWrapper.append('<legend>' + id + '</legend>').append(textarea).append(removeTextareaLink);
		return textareaWrapper.prependTo($(this));
	}

});