<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<style>
	#aside { display: none;  }
</style>
<h2 class="sound_only">최신글</h2>

<div class="latest_top_wr">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/pic_list', 'free', 4, 23);		// 최소설치시 자동생성되는 자유게시판
	// echo latest('theme/pic_list', 'qa', 4, 23);			// 최소설치시 자동생성되는 질문답변게시판
	// echo latest('theme/pic_list', 'notice', 4, 23);		// 최소설치시 자동생성되는 공지사항게시판
    ?>
</div>
<div class="latest_wr">
    <!-- 사진 최신글2 { -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/pic_block', 'gallery', 4, 23);		// 최소설치시 자동생성되는 갤러리게시판
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>

<div class="latest_wr">
<!-- 최신글 시작 { -->
    <?php
    //  최신글
    $sql = " select bo_table
                from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
                where a.bo_device <> 'mobile' ";
    if(!$is_admin)
	$sql .= " and a.bo_use_cert = '' ";
    $sql .= " and a.bo_table not in ('notice', 'gallery') ";     //공지사항과 갤러리 게시판은 제외
    $sql .= " order by b.gr_order, a.bo_order ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		$lt_style = '';
    	if ($i%3 !== 0 ) $lt_style = "margin-left:2%";
    ?>
    <div style="float:left;<?php echo $lt_style ?>" class="lt_wr">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        // echo latest('theme/basic', $row['bo_table'], 6, 24);
        ?>
    </div>
    <?php
    }
    ?>
    <!-- } 최신글 끝 -->
</div>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap'); */
    @import url('https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap');

	div.intro { 
         /* border: 1px solid;  */
         width: 1200px; 
         height: 600px; 
         margin: 0 0 12px 0;
         /* overflow: hidden; */
    }
    div.intro div.intro_title {
        width: 800px;
        height: 60px;
        background: #ccc;
        border-radius: 30px;
        box-shadow: 2px 2px #121212;
    }
    div.intro div.intro_title > h1 { 
        font-size: 2.4em; 
        font-weight: 400; 
        padding: 10px 0 0 30px; 
    }
    div.intro div.intro_contents {
        /* width: 800px; */
        /* border: 1px solid; */
        margin: 20px 5px 5px 5px;
        /* width: 600px; */
        height: 540px;
        border-radius: 20px;
        background: #fff;
        box-shadow: -2px 5px 2px #ccc;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        display: flex;
        justify-content: left;
        align-items: flex-start;
        gap: 5px;
        /* overflow: hidden; */
        /* box-sizing: border-box; */
        /* overflow: hidden; */
        padding-bottom: 30px;
        overflow: hidden;
    }
    div.intro div.intro_contents p.intro_p { 
        /* border: 1px solid; */
        /* padding-top: 30px; */        
        width: 40%; 
        height: 500px; 
        padding: 50px 20px 20px 20px;
        font-family: 'Noto Sans KR', sans-serif;
        /* font-family: 'Do Hyeon', sans-serif; */
        font-size: 1.6em;
        line-height: 30px; 
        word-break:break-all;
        /* overflow: hidden; */
    }
    div.intro div.intro_contents img {
        /* position: fixed; */
        /* top: 0; */
        /* left: 0; */
        object-fit: cover;
        width: 60%; 
        height: 500px; 
        /* min-width: 100%; */
        /* min-height: 100%; */
        padding: 5px 15px 5px 15px;
        /* object-position: left bottom;  */
    }

    div.product{ padding-top: 50px; }

	div.product section.product_a { 
        /* border: 1px solid;  */
        width: 1200px; 
        height: 600px; 
        margin: 50px 0 20px 0;
        padding-bottom: 30px;
        /* overflow: hidden; */
    }
    div.product section.product_a .product_a_title {
        width: 800px;
        height: 60px;
        background: #ccc;
        border-radius: 30px;
        box-shadow: 2px 2px #121212;
    }
    div.product section.product_a .product_a_title > h1 {
        font-size: 2.4em; 
        font-weight: 400; 
        padding: 10px 0 0 30px;
    }
    div.product section.product_a .product_a_contents {
        position: relative;
        margin: 10px 5px;
        /* width: 600px; */
        height: 540px;
        border-radius: 20px;
        background: #fff;
        box-shadow: -2px 5px 2px #ccc;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        /* display: flex; */
        /* justify-content: center; */
        /* align-items: center; */
        /* flex-wrap: wrap; */
        /* gap: 10px; */
        /* box-sizing: border-box; */
    }
    div.product section.product_a .product_a_contents .product_a_contents_detail {
        
        display: flex;
        justify-content: center;
        align-items: center;
    } 
    div.product section.product_a .product_a_contents ul {
        padding: 0;
        margin: 0;
        list-style: none;
        width: 300px;
        height: 60px;
        margin: 0 auto;
        padding-top: 30px;
        /* box-sizing: border-box; */
     }
    div.product section.product_a .product_a_contents ul li {
        /* width: 300px; */
        /* height: 60px; */
        /* margin: 0 auto; */
        /* position: absolute; */
        /* top: 20px; */
        /* left: 100px; */
        font-size: 1.8em;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
        /* padding-top: 30px; */
    }
    div.product section.product_a .product_a_contents img {
        
        width: 200px;
        padding: 50px 10px 10px 10px;
    }
	div.product section.product_b { 
        /* border: 1px solid;  */
        width: 1200px; 
        height: 600px; 
        /* margin: 40px 0 12px 0; */
        margin: 150px 0 20px 0;
        padding-bottom: 30px;
    }
    div.product section.product_b div.product_b_title {
        width: 800px;
        height: 60px;
        background: #ccc;
        border-radius: 30px;
        box-shadow: 2px 2px #121212;
    }
    
    div.product section.product_b .product_b_title > h1 {
        font-size: 2.4em; 
        font-weight: 400; 
        padding: 10px 0 0 30px;
    }
    div.product section.product_b div.product_b_contents {
        margin: 10px 5px;
        /* width: 600px; */
        height: 540px;
        border-radius: 20px;
        background: #fff;
        box-shadow: -2px 5px 2px #ccc;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 10px;
        /* box-sizing: border-box; */
        padding-bottom: 50px;
    }
    
    div.product section.product_b .product_b_contents img {        
        width: 200px;
        padding: 50px 10px 10px 10px;
    }
	div.product section.product_c { 
        /* border: 1px solid;  */
        width: 1200px; 
        height: 600px; 
        /* margin: 40px 0 12px 0; */
        margin: 150px 0 20px 0;
    }
    div.product section.product_c .product_c_title {
        width: 800px;
        height: 60px;
        background: #ccc;
        border-radius: 30px;
        box-shadow: 2px 2px #121212;
    }
    
    div.product section.product_c .product_c_title > h1 {
        font-size: 2.4em; 
        font-weight: 400; 
        padding: 10px 0 0 30px;
    }
    div.product section.product_c div.product_c_contents {
        margin: 10px 5px;
        /* width: 600px; */
        height: 540px;
        border-radius: 20px;
        background: #fff;
        box-shadow: -2px 5px 2px #ccc;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 10px;
        /* box-sizing: border-box; */
        padding-bottom: 50px;
    }
    div.product section.product_c .product_c_contents img {        
        width: 200px;
        padding: 50px 10px 10px 10px;
    }
</style>
<div id="intro" class="intro">
	<div class="intro_title">
		<h1>회사소개</h1>
    </div>
    <div class="intro_contents">
        <p class="intro_p">
        30년 이상 축적된<br> 노하우와 기술로 만들어낸<br><b> 창성기술</b>의<br> 다양한 제품들은 오로지 고객들을<br>위한&nbsp;<b>열정으로</b>&nbsp;디자인 되었습니다.<br><br><br>
        특허 및 기술 개발을 통하여<br> 기계 및  건축자재 개발에 <br>획기적인 제품들을 &nbsp;지속적으로<br> 선보이며 <b>미래산업</b> 선도하겠습니다.<br><br><br>
        <b>감사합니다.</b>
        </p>
        <img src="<?php echo G5_THEME_URL ?>/intro_img01.png">
    </div>
</div>
<div id="product" class="product">
    <section class="product_a">
        <div class="product_a_title">
            <h1>제품소개</h1>
        </div>	
        <div class="product_a_contents">
            <ul>
                <li>획기적인 기술로</li>
                <li>가장 경제적인 원터치 철근 커플러</li>
            </ul>
            <div class="product_a_contents_detail">
                <img src="https://via.placeholder.com/180x240.png?text=Product1">
                <img src="https://via.placeholder.com/180x240.png?text=Product2">
                <img src="https://via.placeholder.com/180x240.png?text=Product3">
                <img src="https://via.placeholder.com/180x240.png?text=Product4">
                <img src="https://via.placeholder.com/180x240.png?text=Product5">
            </div>
        </div>	
	</section>
    <section class="product_b">
        <div class="product_b_title">
		    <h1>제품사양</h1>
        </div>
        <div class="product_b_contents">
            <img src="https://via.placeholder.com/180x240.png?text=Product1">
            <img src="https://via.placeholder.com/180x240.png?text=Product2">
            <img src="https://via.placeholder.com/180x240.png?text=Product3">
            <img src="https://via.placeholder.com/180x240.png?text=Product4">
            <img src="https://via.placeholder.com/180x240.png?text=Product5">

        </div>
	</section>
    <section class="product_c">
        <div class="product_c_title">
		    <h1>제품인증</h1>
        </div>
        <div class="product_c_contents">
            <img src="https://via.placeholder.com/180x240.png?text=Product1">
            <img src="https://via.placeholder.com/180x240.png?text=Product2">
            <img src="https://via.placeholder.com/180x240.png?text=Product3">
            <img src="https://via.placeholder.com/180x240.png?text=Product4">
            <img src="https://via.placeholder.com/180x240.png?text=Product5">

        </div>
	</section>  
</div>
<div id="cert_report" class="cert_report">
</div>
<div id="custom_center" class="custom_center">
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');