jQuery(document).ready(function($){
  $('.js-form').each(function() {
    new NimbusValidate(this);
  });
});

function NimbusValidate(form) {
  this.initialize(form);
  this.handleEvents();
};

NimbusValidate.prototype.initialize = function(form) {
  this.$form = $(form);
  this.$elem = this.$form.find('.js-validate');
  this.$submitBtn = $('.js-submit');
  this.errorMessages = {};
  this.errors = true;

  this.regex = {
    required: '',
    maxlength: 8,
    minlength: 4,
    number: /^[-]?[0-9]+(¥.[0-9]+)?$/,
    url: /^(https?|ftp)(:\/\/[-_.!~*¥'()a-zA-Z0-9;¥/?:¥@&=+¥$,%#]+)$/,
    mail: /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
  };

  this.errorText = {
    required: '必須項目です',
    maxlength: this.regex.maxlength + '文字以下にしてください',
    minlength: this.regex.minlength + '文字以上入力してください',
    number: '半角数字で入力してください',
    url: 'URLが正しくありません',
    mail: 'メールアドレスが正しくありません'
  };

  var self = this;
  this.$elem.each(function() {
    var $attr = $(this).attr('name');
    self.errorMessages[$attr] = {message: []};
  });
};

NimbusValidate.prototype.validation = function(el) {
  var $attr = $(el).attr('name');
  var self = this;
  self.errorMessages[$attr] = {message: []};

  for( var key in $(el).data()) {

    if ($(el).data().hasOwnProperty(key) && $(el).data()[key] == true) {

      if(this[key]($(el), key, this.regex[key])) return;

      if(this.errorMessages[$attr].message.length > 0) {
        this.errorMessages[$attr].message.map(function(t) {
          self.appendErrorText($(el), t);
        });
        this.inValid($(el));
      }else {
        this.valid($(el));
      }
    }
  }
  this.errorEach();
};

NimbusValidate.prototype.errorEach = function() {
  var flg = true
  for(var key in this.errorMessages) {
    if(this.errorMessages[key].message.length > 0) {
      flg = true;
      break;
    }else {
      flg = false;
    }
  }
  this.errors = flg;
}

NimbusValidate.prototype.handleEvents = function() {
  var self = this;
  this.$elem.on('keyup blur', function(){
    self.validation(this);
  });

  this.$submitBtn.on('click', function(){

    if(!self.errors) {
      self.$form.submit();
    }else {
      self.checkErrorExists();
    }
  });
};

NimbusValidate.prototype.checkErrorExists = function() {
  var self = this;
  this.$elem.each(function() {
    self.validation(this);
  });
};

NimbusValidate.prototype.inValid = function(el) {
  el.parent().addClass('is-error');
};

NimbusValidate.prototype.valid = function(el) {
  el.parent().removeClass('is-error');
};

NimbusValidate.prototype.appendErrorText = function(el, text) {
  el.next().find('.js-error-text').remove();
  el.next().append('<p class="js-error-text u-mb-0">' + text + '</p>');
};

NimbusValidate.prototype.required = function(el, key){
  var $attr = el.attr('name');

  if(el.data(key) && key == 'required'){
    if(el.val() ===''){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }
};

NimbusValidate.prototype.mail = function(el, key, reg){
  if(el.val() === '') return;

  var $attr = el.attr('name');
  if(el.data(key) && key == 'mail'){
    if(!el.val().match(reg)){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }
};

NimbusValidate.prototype.maxlength = function(el, key, reg){
  if(el.val() === '') return;

  var $attr = el.attr('name');
  if(el.data(key) && key == 'minlength'){
    if(reg < el.val().length){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }
};

NimbusValidate.prototype.minlength = function(el, key, reg){
  if(el.val() === '') return;

  var $attr = el.attr('name');
  if(el.data(key) && key == 'minlength'){
    if(reg >= el.val().length){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }

};

NimbusValidate.prototype.number = function(el, key, reg){
  if(el.val() === '') return;

  var $attr = el.attr('name');
  if(el.data(key) && key == 'number'){
    if(!el.val().match(reg)){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }
};

NimbusValidate.prototype.url = function(el, key, reg){
  if(el.val() === '') return;

  var $attr = el.attr('name');
  if(el.data(key) && key == 'url'){
    if(!el.val().match(reg)){
      this.errorMessages[$attr].message.push(this.errorText[key]);
    }
  }
};