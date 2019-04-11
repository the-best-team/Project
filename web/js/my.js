$(document).ready(function () {

    //***** Объявление переменных ************//

    //Стиль для надписи, что список целей пуст
    let styleEmptyClass = $(".targets-index").children(".list-view").children(".empty");
    //Стиль для надписи Сколько карточек с целями показано из скольки "Showing 1-2 of 2 items."
    let styleSummaryClass = $(".targets-index").children(".list-view").children(".summary");
    //Объект с потомками элемента div.list-view
    let arrCard = $(".targets-index").children(".list-view").children();
    //Количество карточек целей
    let countCard = arrCard.length - 1;
    //Элемент div.list-view
    let containerCard = $(".targets-index").children(".list-view");




    //***** Объявение функций ****************//
    /**
     * Функция прохода по карточкам целей и добавления им стилей css
     */
    function cardTargetsElement() {
        for (let i = 1; i <= countCard; i++){
            //добавляем класс карточкам целей
            let card = arrCard[i];
            card.classList.add("cardTargets");
        }
    }

    /**
     * Если список целей пуст - просто стилизуем надпись, говорящую об этом
     * Если карточки целей есть - добавляем классы
     */
    if(styleEmptyClass.length != 0){
        styleEmptyClass[0].style.marginTop = "50px";
    } else {
        //добавляем класс контейнеру с целями
        containerCard.addClass("targetsContainer");
        //вызываем функцию cardTargetsElement
        cardTargetsElement();
    }

    if(styleSummaryClass.length != 0){
        styleSummaryClass.addClass("summaryClass");

    }


});