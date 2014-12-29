$(function () {

	var config = {
		'profizMags' : [
			{'code':'kr'},
			{'code':'sr'},
			{'code':'se'},
			{'code':'eco'},
			{'code':'sec'},
			{'code':'peo'}
		],
		'addresseeForums' : [
			{'name' : 'buhgalter-info.ru'},
			{'name' : 'kadrovik-info.ru'},
			{'name' : 'economist-info.ru'},
			{'name' : 'sekretar-info.ru'},
			{'name' : 'ecolog-info.ru'}
		]
	};

	var body = $('body');
	var parserSelect = $('[name="parser-select"]');
	var controlPanel = $('#parser-control-panel');
	var parseForm = $('#parse-form');
	var formWrapper = $('#form-wrapper');
	var submitBtn = parseForm.find('input[type="submit"]');
	var parserName = parseForm.find('input[name="parserName"]');

	parserSelect.on('change', function() {
		controlPanel.hide('fast').empty();
		formWrapper.hide('fast');
		parseForm.children().not(submitBtn).not(parserName).remove();
		var selectValue = $(this).val();
		parserName.attr('value',selectValue);
		switch(selectValue) {
			case 'profizDigestParser' : controlPanel.apppendProfizMagsDigestControls().show('fast'); break;
			default : body.prependMessage('error','Неизвестный парсер'); break;
		}
	});


	/**
	 * Вставляет блок с информационным сообщением в начало this
	 * @param type
	 * @param text
	 * @returns {*|jQuery|HTMLElement}
	 */
	$.prototype.prependMessage = function(type, text) {
		$('.message').remove();
		var messageBlock = $('<div class="message">' + text + '</div>');
		messageBlock.append(createRemover(messageBlock));
		return messageBlock.prependTo($(this)).addClass(type).show('fast');
	};

	/**
	 *
	 * @returns {$}
	 */
	$.prototype.apppendProfizMagsDigestControls = function () {
		$(this).append(createProfizMagsButtonsPanel());
		parseForm.prepend(createAddresseeForumsPanel());
		formWrapper.show();
		return this;
	};

	/**
	 *
	 * @returns {*|jQuery|HTMLElement}
	 */
	var createProfizMagsButtonsPanel = function () {
		var panel = $('<div id="profiz-mags-to-parse-buttons-panel"><h3>Выберите журналы которые нужно сверстать в один документ</h3></div>');
		$.each(config.profizMags, function() {
			$('<button name="add-textarea" data-mag="' + this.code + '">'+ this.code + '</button>').appendTo(panel);
		});
		return panel;
	};

	var createAddresseeForumsPanel = function () {
		var wrapper = $('<div class="addr-forums-wrapper"><h3>Форум на который пойдет рассылка</h3></div>');
		var list = $('<ul></ul>').appendTo(wrapper);
		$.each(config.addresseeForums, function () {
			list.append($('<li><input type="radio" name="addresseeForum" id = ' + this.name + ' value="' + this.name + '"><label for="' + this.name + '">' + this.name + '</label></li>'));
		});
		return wrapper;
	};

	$(document).on('click', '[name="add-textarea"]',function () {
		var btn = $(this);
		btn.attr('disabled', 'disabled');
		var mag = $(this).data('mag');
		var textAreaWrapper = $('<div class="textarea-wrapper"><h3>' +mag + '</h3></div>');
		createRemover(textAreaWrapper).appendTo(textAreaWrapper).on('click', function () {
			btn.removeAttr('disabled');
		});
		textAreaWrapper.append();
		var textarea = $('<textarea id="' + mag + '-parse-textarea" cols="120" rows="20" name=texts[' + mag + ']>');
		submitBtn.before(textAreaWrapper.append(textarea));
	});

	/**
	 *
	 * @param toRemove
	 * @returns {*|jQuery|HTMLElement}
	 */
	var createRemover = function (toRemove) {
		var x = $('<a href="#">✖</a>');
		x.on('click', function () {
			toRemove.hide('fast', function () {
				$(this).remove();
			});
		});
		return x;
	};

});