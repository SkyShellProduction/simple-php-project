try {
    class SliderNew {
        constructor({ el, active, duration, direction, indicators, indicatorsElem, slides, sliderLines, arrows, prev, next }) {
            this.posX1 = 0;
            this.posX2 = 0;
            this.posInit = 0;
            this.posFinal = 0;
            this.posHold = 70;
            this.arrows = arrows;
            this.slider = document.querySelector(el); //блок со слайдером
            this.sliderLines = document.querySelector(sliderLines);//блок со слайдами
            this.slides = [...this.sliderLines.querySelectorAll(slides)];//слайды
            this.active = active;//активный слайд
            this.duration = (duration != undefined && duration < 400) ? duration : 400; //transition
            this.direction = direction.toUpperCase();//в какое направление двигать слайд
            this.width = this.sliderLines.clientWidth; //ширина слайда
            this.height = this.sliderLines.clientHeight; //высота слайда
           
            this.moveSize = (this.direction == 'X') ? this.width : this.height; //на сколько двигать слайд
            this.indicatorsParent = this.slider.querySelector(indicators);
            this.indicators = [...this.slider.querySelectorAll(indicatorsElem)]; //сами индикаторы

            this.touch = true; //отключение тауча при отпускании кнопки мыши
            if (this.arrows) {
                this.prev = this.slider.querySelector(prev);
                this.next = this.slider.querySelector(next);
                this.prev.addEventListener('click', () => this.moveLeft());
                this.next.addEventListener('click', () => this.moveRight());
            }
            this.slides.forEach(item => { //даем всем слайдам одинаковую высоту и ширину и абслютное позиционирование
                item.style = `
            width: ${this.width}px;
            height: ${this.height}px;
            position: absolute;
            `
            })
            this.slides.forEach(item => {
                if (item != this.slides[this.active]) {
                    item.style.transform = `translate${this.direction}(${this.moveSize}px)`;
                    item.style.overflow = `hidden`;
                } if (item == this.slides[this.slides.length - 1]) {
                    item.style.transform = `translate${this.direction}(${this.moveSize * -1}px)`;
                }
            })
            window.addEventListener('resize', () => {
                this.width = this.sliderLines.clientWidth; //ширина слайда
                this.height = this.sliderLines.clientHeight; //высота слайда
                this.moveSize = (this.direction == 'X') ? this.width : this.height; //на сколько двигать слайд

                this.slides.forEach(item => { //даем всем слайдам одинаковую высоту и ширину и абслютное позиционирование
                    item.style = `
                width: ${this.width}px;
                height: ${this.height}px;
                position: absolute;
                `

                    this.slides.forEach(item => {
                        if (item != this.slides[this.active]) {
                            item.style.transform = `translate${this.direction}(${this.moveSize}px)`;
                            item.style.overflow = `hidden`;
                        } if (item == this.slides[this.slides.length - 1]) {
                            item.style.transform = `translate${this.direction}(${this.moveSize * -1}px)`;
                        }
                    })
                })
            })
            this.indicators.forEach(item => {
                item.addEventListener('click', e => this.indicatorsNav(e));
            });
            this.sliderLines.addEventListener('touchstart', (e) => this.swipeStart(e), { passive: false });
            this.sliderLines.addEventListener('mousedown', (e) => this.swipeStart(e), { passive: false });
            // this.slides[this.active].classList.add('active');
            // this.slides[this.slides.length - 1].classList.add('previous');
            // this.slides[this.active + 1].classList.add('nextSl');
            this.setClass();
            this.changeClasses();
        }
        changeClasses() {//меняем классы индикаторам при переключении слайдера или автоплее
            this.indicators.forEach(item => item.classList.remove('active'));
            this.indicators[this.active].classList.add('active');
        }
        slidePosition() { //расставляем слайды по нужным позициям при нажатии на индикатор или категорию индикатора
            let index = this.indicators.findIndex(item => item.classList.contains('active'));
            this.active = index;
            this.slides.forEach(item => {
                item.style.transition = '0ms';
                if (item !== this.slides[this.active]) {
                    item.style.display = 'none';
                    item.style.transform = `translate${this.direction}(${this.moveSize}px)`
                    item.style.overflow = `hidden`;
                    setTimeout(() => {
                        item.style.display = 'flex';
                    }, 200);
                }
                if (item == this.slides[this.active]) {
                    this.slides[this.active].style.transform = `translate${this.direction}(${0})`;
                    this.slides[this.active].style.overflow = `visible`;
                }
                this.setClass();
                if (item.classList.contains('previous')) {
                    item.style.transform = `translate${this.direction}(${this.moveSize * -1}px)`;
                }
                if (item.classList.contains('nextSl')) {
                    item.style.transform = `translate${this.direction}(${this.moveSize}px)`;
                }
            })
        }
        setClass() { //функция которая назначает слайдам классы и на их основании уже слайды будут сдвигаться при свайпе
            for (let i = 0; i < this.slides.length; i++) {
                this.slides[i].classList.remove('previous');
                this.slides[i].classList.remove('active');
                this.slides[i].classList.remove('nextSl');
            }
            this.slides.forEach(item => {
                if (item == this.slides[this.active]) {
                    item.classList.add('active');
                    if (item == this.slides[0]) this.slides[this.slides.length - 1].classList.add('previous');
                    else item.previousElementSibling.classList.add('previous');
                    if (item == this.slides[this.slides.length - 1]) this.slides[0].classList.add('nextSl');
                    else item.nextElementSibling.classList.add('nextSl');
                }
            })
        }
        indicatorsNav(e) {//переулючаемся по индикаторам и категориям индикаторов, параллельно переходя на нужный слайд
            e.preventDefault();
            this.indicators.forEach(item => item.classList.remove('active'));
            e.target.classList.add('active');
            this.slidePosition();
        }
        moveLeft() {//переключить на предыдущий слайд
            this.slides.forEach(item => {
                item.style.transition = '0ms';
                if (item != this.slides[this.active]) {
                    item.style.transform = `translate${this.direction}(${this.moveSize * -1}px)`
                }
            })
            this.slides[this.active].style.transition = `${this.duration}ms`;
            this.slides[this.active].style.transform = `translate${this.direction}(${this.moveSize}px)`;
            this.slides[this.active].style.overflow = `hidden`;
            this.active--;
            if (this.active < 0) this.active = this.slides.length - 1;
            this.slides[this.active].style.transition = `${this.duration}ms`;
            this.changeClasses();
            this.slides[this.active].style.transform = `translate${this.direction}(${0}px)`;
            this.slides[this.active].style.overflow = `visible`;
            this.setClass();
        }
        moveRight() {//переключение на следующий слайд
            this.slides.forEach(item => {
                item.style.transition = '0ms';
                if (item != this.slides[this.active]) {
                    item.style.transform = `translate${this.direction}(${(this.moveSize * -1) * -1}px)`
                }
            })
            this.slides[this.active].style.transition = `${this.duration}ms`;
            this.slides[this.active].style.transform = `translate${this.direction}(${this.moveSize * -1}px)`;
            this.slides[this.active].style.overflow = `hidden`;
            this.active++;
            if (this.active == this.slides.length) this.active = 0;
            this.slides[this.active].style.transition = `${this.duration}ms`;
            this.changeClasses();
            this.slides[this.active].style.transform = `translate${this.direction}(${0}px)`;
            this.slides[this.active].style.overflow = `visible`;
            this.setClass();

        }
        moveCenter() {//оцентровка слайдера, если слайд не достаточно сдвинули в нужную сторону
            this.slides.forEach(item => {
                // item.style.transition = `${this.duration}ms`;
                this.slides[this.active].style.transform = `translate${this.direction}(0)`;
                if (item.classList.contains('previous')) item.style.transform = `translate${this.direction}(${this.moveSize * -1}px)`
                if (item.classList.contains('nextSl')) item.style.transform = `translate${this.direction}(${this.moveSize}px)`
            })
        }
        swipeStart(e) {//вешаем обработчик касаний на слайдер
            this.sliderLines.style.cursor = 'grabbing';
            this.touch = true;
            this.posX1 = e.type == 'touchstart' ? e.touches[0].clientX : e.clientX;
            this.sliderLines.addEventListener('touchmove', e => this.swipeMove(e), { passive: false });
            this.sliderLines.addEventListener('mousemove', e => this.swipeMove(e), { passive: false });
            document.addEventListener('touchend', e => this.swipeEnd(e), {passive: false});
            document.addEventListener('mouseup', e => this.swipeEnd(e), {passive: false});


        }
        swipeMove(e) { //двигаем слайдер в нужную сторону
            if (this.touch) {
                this.posInit = e.type == 'touchmove' ? e.changedTouches[0].clientX : e.clientX;
                this.posX2 = this.posX1 - this.posInit;
                this.slides.forEach(item => {
                    this.slides[this.active].style.transform = `translateX(${this.posX2 * -1}px)`;
                    item.style.transition = `${this.duration}ms`;
                    if (item.classList.contains('previous')) {
                        item.style.transform = `translate${this.direction}(${(this.moveSize + this.posX2) * -1}px)`
                    }
                    if (item.classList.contains('nextSl')) {
                        item.style.transform = `translate${this.direction}(${this.moveSize - this.posX2}px)`;
                        // item.style.transition = `${this.duration}ms`;
                    }
                })
            }
        }
        swipeEnd(e) {//либо переключаем слайдер либо оставляем текущий
            this.sliderLines.style.cursor = 'grab'
            this.posFinal = e.type == 'touchend' ? e.changedTouches[0].clientX : e.clientX;


            if (this.posHold < this.posX2) {
                this.moveRight();
            } else if (this.posX2 < 0 && this.posX2 < -this.posHold) {
                this.moveLeft();
            } else {
                this.moveCenter();

            }

            this.touch = false
            this.posFinal = 0;
            this.posInit = 0;
            this.posX1 = 0;
            this.posX2 = 0;
        }
    }
    
    let coworkingSlider = new SliderNew({
        el: '.slider',
        sliderLines: '.slideLines',
        active: 0,
        duration: 400,
        direction: 'x',
        indicators: '.indicators',
        indicatorsElem: '.indicators-i',
        slides: '.slide',
        arrows: true,
        prev: '.prev',
        next: '.next'
    })
} catch (e) { }

function ajax(path, data, elem){
    fetch(path, {
        method: "POST",
        body: data
    })
    .then(res => {
        if(res.ok) return res.text();
    })
    .then(res => {
        let err = document.querySelector('.error__info');
        if(elem !== undefined) elem.reset();
        if(res == 'yes') window.location = '/?route=main';
        else err.innerHTML = res;
        setTimeout(() => {
            err.innerHTML = '';
        }, 2000);
    })
    .catch(e => console.log(e));
}

try {
    let formEmail = document.querySelector('.form__email');
    formEmail.addEventListener('submit', function(e){
        e.preventDefault();
        ajax('./tools/mail.php', new FormData(this), this);
    })
} catch (e) {
    
}

try {
    let formEmail = document.querySelector('.form__tg');
    formEmail.addEventListener('submit', function(e){
        e.preventDefault();
        ajax('./tools/tg.php', new FormData(this), this);
    })
} catch (e) {
    
}



try {
    let regForm = document.querySelector('.register__form'),
        regInputs = [...regForm.querySelectorAll('.input:not(.input[type=file])')],
        regBtn = regForm.querySelector('.btn'),
        regPass = regForm.querySelectorAll('.input[type=password]'),
        regImg = regForm.querySelector('.register__img'),
        loadImg = regForm.querySelector('.input[type=file]');
        regInputs.forEach(item => {
            item.addEventListener('input', function(){
                if(regInputs.every(item => item.value !== '' ? item : '') && regPass[0].value == regPass[1].value){
                    regBtn.disabled = false;
                }
                else regBtn.disabled = true;
            })
        })
        loadImg.addEventListener('change', function(e){
            let reader = new FileReader();
            reader.onloadend = function(){
                regImg.src = reader.result;
            }
            if(this.files[0]){
                let data = reader.readAsDataURL(this.files[0]);
                regImg.setAttribute('src', data);
            }
        })
        regForm.addEventListener('submit', function(e){
            e.preventDefault();
            ajax('./tools/sign-up.php', new FormData(this), this);
        })
} catch (e) {
    
}


try {
    let formLogin = document.querySelector('.form__login');
    formLogin.addEventListener('submit', function(e){
        e.preventDefault();
        ajax('./tools/auth.php', new FormData(this), this);
    })
} catch (e) {
    
}


try {
    const avatarImg = document.querySelector('.avatar__img'),
          modal = document.querySelector('.avatar__modal'),
          modalImg = modal.querySelector('img');
    avatarImg.addEventListener('click', function(){
        modal.classList.add('active');
        modalImg.src = this.src;
    });
    modal.addEventListener('click', function(e){
        if(e.target !== modalImg) this.classList.remove('active');
    })
} catch (e) {
    
}

function bodyClass(elem, clas, bool = true){
    if(bool) elem.classList.remove(clas);
    else elem.classList.add(clas);
}
const busketBtn = document.querySelector('.busket__btn'),
      headerAbs = document.querySelector('.header__abs');  
      const busketMenu = document.querySelector('.goods__form');
if(busketBtn){
        busketBtn.addEventListener('click', function(e){
            e.preventDefault();
            if(this.classList.contains('active')){
                bodyClass(this, 'active');
                bodyClass(busketMenu, 'active');
                bodyClass(document.body, 'hidden');
                bodyClass(headerAbs, 'active');
            }
            else {
                bodyClass(this, 'active', false);
                bodyClass(busketMenu, 'active', false);
                bodyClass(document.body, 'hidden', false);
                bodyClass(headerAbs, 'active', false);
            }
        })
}
const asideBtn = document.querySelector('.aside__btn');
const asideMenu = document.querySelector('.aside');
if(asideBtn){
    asideBtn.addEventListener('click', function(e){
        if(this.classList.contains('active')){
            bodyClass(this, 'active');
            bodyClass(asideMenu, 'active');
            bodyClass(document.body, 'hidden');
            bodyClass(headerAbs, 'active');
        }
        else {
            bodyClass(this, 'active', false);
            bodyClass(asideMenu, 'active', false);
            bodyClass(document.body, 'hidden', false);
            bodyClass(headerAbs, 'active', false);
        }
    })
};
headerAbs.addEventListener('click', function(e){
    bodyClass(this, 'active');
    bodyClass(document.body, 'hidden');
    bodyClass(asideMenu, 'active');
    bodyClass(busketMenu, 'active');
    bodyClass(busketBtn, 'active');
    bodyClass(asideBtn, 'active');
})
const goodsBtn = document.querySelectorAll('.goods__button');
if(goodsBtn){
    goodsBtn.forEach(item => {
        item.addEventListener('click', function(e){
            e.preventDefault();
            let section = e.target.closest('.goods__food-item'),
                symbol = this.getAttribute('data-symbol'),
                out = section.querySelector('.goods-inp');
            if(symbol == '+' && out.value < 10) out.value++;
            else if(symbol == '-' && out.value > 1) out.value--;    
        })
    })
}