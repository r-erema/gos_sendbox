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
	var parserSelect = $('#parser-select');
	var controlPanel = $('#parser-control-panel');

	parserSelect.on('change', function() {
		controlPanel.hide('fast').empty();
		var selectValue = $(this).val();
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
		var messageBlock = $('<div class="message">' + text + '</div>');
		var x = $('<a href="#">✖</a>').appendTo(messageBlock);
		x.on('click', function () {
			messageBlock.hide('fast', function () {
				$(this).remove();
				return false;
			})
		});
		return messageBlock.prependTo($(this)).addClass(type).show('fast');
	};

	/**
	 *
	 * @returns {$}
	 */
	$.prototype.apppendProfizMagsDigestControls = function () {
		$(this).append(createProfizMagsButtonsPanel());
		return this;
	};

	/**
	 *
	 * @returns {*|jQuery|HTMLElement}
	 */
	var createProfizMagsButtonsPanel = function () {
		var panel = $('<div id="profiz-mags-to-parse-buttons-panel"><p>Выберите журналы которые нужно сверстать в один документ</p></div>');
		$.each(config.profizMags, function() {
			$('<button id="add-' + this.code + '-textarea" data-mag="' + this.code + '">'+ this.code + '</button>').appendTo(panel).on('click', addProfizDigestMagTextarea($(this).data('mag')));
		});
		return panel;
	};

	var createAddresseeForumsPanel = function () {
		var div = $('<div id="addressee-forums-buttons">Форум получателей:<br /></div>');
		$.each(config.addresseeForums, function () {
			div.append('<input type="radio" name="addresseeForum" value="' + this.name + '">' + this.name + '<br />');
		});
		return div;
	};

	var addProfizDigestMagTextarea = function(mag) {

	}

});