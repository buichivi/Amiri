//Đối tượng 'Validator'
function Validator(options) {

    var selectorRules = {};

    function validate(inputElement, rule) {
        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        var errorMessage;

        
        var rules = selectorRules[rule.selector];
        for (let i = 0; i < rules.length; i++) {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.parentElement.classList.add('invalid');
        }
        else {
            errorElement.innerText = '';
            inputElement.parentElement.classList.remove('invalid');
        }
        return !errorMessage;
    }

    // Lấy element của form cần validate
    var formElement = document.querySelector(options.form);
    if (formElement) {
        // Khi submit form 
        formElement.onsubmit = function(e) {
            var isFormValid = true;
            options.rules.forEach(function (rule){
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            })
            if (isFormValid) {
                
            }
            else {
                e.preventDefault();
            }
        }
        // Lặp qua mỗi rule và xử lý (lắng nghe sự kiện blur, input, ...).
        options.rules.forEach(rule => {
            // Lưu lại các rule
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            }
            else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                // Xử lý trường hợp blur khỏi input
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }


                // Xử lý mỗi khi người dùng nhập vào input
                inputElement.oninput = function () {
                    var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        });
    }

}

//Định nghĩa rules

Validator.isRequired = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            return (value.trim()) ? undefined : message || 'Vui lòng nhập trường này';
        }
    };
}

Validator.isEmail = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập định dạng email'
        }
    };
}

Validator.isPhoneNumber = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /((\+84)|0[1-9])+([0-9]{8})\b/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập số điện thoại'
        }
    };
}

Validator.minLength = function(selector, min, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu 6 ký tự`;
        }
    };
}


Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value == getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}

