

// header sidebar---------------------------------------------------------------------

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

// header sidebar end---------------------------------------------------------------------



// index search ---------------------------------------------------------------------

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// index search end ---------------------------------------------------------------------


    jQuery(document).ready(function() {
        // product-catagory 

            //하트 평점에 맞춰 색상 변경
        const reviewNum = parseFloat($(".reviewNum").text());
        const fullStars = Math.floor(reviewNum);
        const decimal = reviewNum % 1;
        const stars = jQuery(".fa002");

        stars.each(function(index) {
            if (index < fullStars) {
                jQuery(this).addClass("gold001");
            } else if (decimal > 0.0 && decimal < 0.5 && index === fullStars) {
                jQuery(this).addClass("half001");
            } else if (decimal >= 0.5 && index === fullStars) {
                jQuery(this).addClass("gold001");
            }
        });


        //single-product
        var updateSections = function() {
            section1 = jQuery('#proInfo').offset().top;
            section2 = jQuery('#proRevi').offset().top;
            section3 = jQuery('#detailInfo').offset().top;
        }
    
        var section1, section2, section3;
        updateSections();

        jQuery('.div_002').scroll(function(){

            let scroll = jQuery('.div_002').scrollTop();
            let scroll2 = scroll + 120;

            jQuery('.product_sticky').removeClass("activeBotCol");
            
            if (scroll2 >= section1 && section2 > scroll2) {
                jQuery('.product_sticky').removeClass("activeBotCol");
                jQuery('.tab001 a:nth-child(1)').children().addClass("activeBotCol");
            } else if (scroll2 >= section2 && section3 > scroll2) {
                jQuery('.product_sticky').removeClass("activeBotCol");
                jQuery('.tab001 a:nth-child(2)').children().addClass("activeBotCol");
            } else if (scroll2 >= section3) {
                jQuery('.product_sticky').removeClass("activeBotCol");
                jQuery('.tab001 a:nth-child(3)').children().addClass("activeBotCol");
            }
    
        });

        
		jQuery(".showAll a").click(function(e) {
            e.preventDefault();
			if (jQuery("#proInfo").css('max-height') != '300px') {
                jQuery("#proInfo").css('max-height', '300px');
                jQuery(this).text('더보기');

			} else {
                jQuery("#proInfo").css('max-height', 'none');
				jQuery(this).text('숨기기');

			}
            setTimeout(updateSections, 200);
		});

        
        jQuery('.product_Detail_btn_001 br').remove();


    });
        
        
        
    //찜
    function toggleStarColor(element) {
        jQuery(element).toggleClass('activeColor');
        jQuery(element).children().toggleClass('fa-heart-o fa-heart');
    }







//라디오 버튼 함수02
var radioList = [
"생일","돌","20살 생일","환갑","칠순","프로포즈","결혼","결혼기념일","졸혼","이혼","100일","N주년","이별","발렌타인데이","화이트데이","로즈데이","성년의날","키스데이","할로윈데이","빼빼로데이","신정","설날","추석","크리스마스","근로자의날","어린이날","어버이날","스승의날","성년의날","부부의날","국군의날","입학","새학기","시험기간","졸업","면접","입사","첫출근","휴가","출장","승진심사","승진","중요한 발표","번아웃","사고","퇴사","구직","이직","창업","수학능력시험","고시","임용고시","임신","출산","입대","휴가","전역","여행","이사/집들이","개업",
];

for(var i = 0; i < radioList.length; i++) {
    var span = document.createElement("span");
    var radio = document.createElement("input");
    var label = document.createElement("label");

    radio.setAttribute("type", "radio");
    radio.setAttribute("name", "code02");
    radio.setAttribute("value", radioList[i]);
    radio.setAttribute("id", "radio-0" + (i + 1));
    radio.className = "radio_btn_cus_in";

    label.setAttribute("for", "radio-0" + (i + 1));
    label.className = "radio_btn_cus_la";
    label.innerHTML = radioList[i];

    span.appendChild(radio);
    span.appendChild(label);

    document.getElementById("search_radio_fnc2").appendChild(span);
}


//라디오 버튼 함수03
var radioList = [
"고백","사랑","축하","감사","애도","사과","걱정","아쉬움","유감","그리움","위로","응원","건강","장수","행복","성공","합격","재회","용서",
];

for(var i = 0; i < radioList.length; i++) {
    var span = document.createElement("span");
    var radio = document.createElement("input");
    var label = document.createElement("label");

    radio.setAttribute("type", "radio");
    radio.setAttribute("name", "code03");
    radio.setAttribute("value", radioList[i]);
    radio.setAttribute("id", "radio-00" + (i + 1));
    radio.className = "radio_btn_cus_in";

    label.setAttribute("for", "radio-00" + (i + 1));
    label.className = "radio_btn_cus_la";
    label.innerHTML = radioList[i];

    span.appendChild(radio);
    span.appendChild(label);

    document.getElementById("search_radio_fnc3").appendChild(span);
}


//라디오 버튼 함수01
var giftList = {
    "할아버지": "male",
    "외할아버지": "male",
    "할머니": "female",
    "외할머니": "female",
    "아버지": "male",
    "어머니": "female",
    "장인어른": "male",
    "장모님": "female",
    "시아버지": "male",
    "시어머니": "female",
    "남편": "male",
    "부인": "female",
    "새신랑": "male",
    "새신부": "female",
    "형": "male",
    "누나": "female",
    "오빠": "male",
    "언니": "female",
    "매형": "male",
    "형수": "female",
    "형부": "male",
    "새언니": "female",
    "남동생": "male",
    "여동생": "female",
    "매부": "male",
    "동서": "female",
    "서방님": "male",
    "올케": "female",
    "아들": "male",
    "딸": "female",
    "조카": "unisex",
    "손자": "male",
    "손녀": "female",
    "삼촌": "male",
    "외삼촌": "male",
    "외숙모": "female",
    "숙모": "female",
    "이모": "female",
    "고모": "female",
    "고모부": "male",
    "이모부": "male",
    "사촌 형": "male",
    "사촌 누나": "female",
    "사촌 오빠": "male",
    "사촌 언니": "female",
    "사촌동생": "unisex",
    "남자친구": "male",
    "여자친구": "female",
    "썸남": "male",
    "썸녀": "female",
    "짝남": "male",
    "짝녀": "female",
    "전남친": "male",
    "전여친": "female",
    "동네친구": "unisex",
    "학교선배": "unisex",
    "학교동기": "unisex",
    "학교후배": "unisex",
    "남사친": "male",
    "여사친": "female",
    "임원": "unisex",
    "상급자": "unisex",
    "사수": "unisex",
    "팀장": "unisex",
    "직속상사": "unisex",
    "동기": "unisex",
    "하급자": "unisex",
    "부사수": "unisex",
    "팀원": "unisex",
    "오피스 허즈번드": "male",
    "오피스 와이프": "female",
    "거래처 책임자": "unisex",
    "거래처 담당자": "unisex",
    "목사": "unisex",
    "권사": "unisex",
    "집사": "unisex",
    "신부": "unisex",
    "수녀": "female",
    "대부": "male",
    "대모": "female",
    "은사": "unisex",
    "지인": "unisex"
};


for (var key in giftList) {
    var span = document.createElement("span");
    var radio = document.createElement("input");
    var label = document.createElement("label");

    radio.setAttribute("type", "radio");
    radio.setAttribute("name", "code01");
    radio.setAttribute("value", key);
    radio.setAttribute("id", "radio-" + key);
    radio.className = "genderSel01 radio_btn_cus_in " + giftList[key];

    label.setAttribute("for", "radio-" + key);
    label.className = "radio_btn_cus_la";
    label.innerHTML = key;

    span.appendChild(radio);
    span.appendChild(label);

    document.getElementById("search_radio_fnc").appendChild(span);
}

document.getElementById('genderSelect').addEventListener('change', function() {
    var selectedGender = this.value;
    var allRadios = document.getElementsByClassName('genderSel01');

    for (var i = 0; i < allRadios.length; i++) {
        var radio = allRadios[i];

        if (selectedGender === "all" || radio.classList.contains(selectedGender) || radio.classList.contains('unisex')) {
            radio.parentElement.style.display = '';
        } else {
            radio.parentElement.style.display = 'none';
        }
    }
});


//라디오 클릭시 아코다인 h5 변경
window.onload = function() {

    var radioButtons = document.getElementsByClassName("radio_btn_cus_in");
    Array.from(radioButtons).forEach(function(radioButton) {
        radioButton.addEventListener("change", function(e) {
            var labelFor = "radio-" + e.target.value;
            var labelText = document.querySelector('input[id="' + labelFor + '"]').value;
            document.getElementById("select001").innerText = labelText + "에게 선물하고 싶어요.";
            var nextElement = document.getElementById('select002');
            if (nextElement) {
                nextElement.click();
            }
        });
    });

    var radios = document.querySelectorAll('input[type="radio"][name="code02"]');
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (this.checked) {
                var selectedValue = this.value;
                var h5Element = document.getElementById('select002');
                h5Element.innerHTML = selectedValue + '기념하는 선물을 찾고 있어요.';
            }
            var nextElement = document.getElementById('select003');
            if (nextElement) {
                nextElement.click();
            }
        });
    });

    var radios = document.querySelectorAll('input[type="radio"][name="code03"]');
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
        if (this.checked) {
            var selectedValue = this.value;
            var h5Element = document.getElementById('select003');
            h5Element.innerHTML = selectedValue + '하는 마음을 전하고 싶어요.';
        }
        });
    });


};


//선물리스트 클릭 이벤트
function displayDiv(divClass) {
    var getGiftDiv = document.querySelector('.getGift');
    var sendGiftDiv = document.querySelector('.sendGift');
    var blackCss = document.querySelector('.product_giftbox_ul_002 .blackCss');
    var grayCss = document.querySelector('.product_giftbox_ul_002 .grayCss');

    if (divClass === 'getGift') {
        getGiftDiv.style.display = 'block';
        sendGiftDiv.style.display = 'none';
        blackCss.style.color = 'black';
        grayCss.style.color = 'gray';
        blackCss.style.borderBottom = '5px solid #FFD400'
        grayCss.style.borderBottom = '0' 

    } else if (divClass === 'sendGift') {
        sendGiftDiv.style.display = 'block';
        getGiftDiv.style.display = 'none';
        blackCss.style.color = 'gray';
        grayCss.style.color = 'black';
        blackCss.style.borderBottom = '0'
        grayCss.style.borderBottom = '5px solid #FFD400' 
    }
}


