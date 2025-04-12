<?php
require_once 'config.php';
// 名前生成用の配列
$prefixes = [
    '闇の', '光の', '炎の', '氷の', '雷の', '風の', '大地の', '天空の', '深淵の', '聖なる',
    '漆黒の', '白銀の', '黄金の', '翠緑の', '紅蓮の', '蒼穹の', '紫電の', '銀河の', '混沌の', '秩序の',
    '暗黒の', '輝光の', '灼熱の', '極寒の', '轟雷の', '疾風の', '岩山の', '星雲の', '奈落の', '神聖の',
    '真紅の', '蒼藍の', '翠玉の', '琥珀の', '紫紺の', '翡翠の', '珊瑚の', '瑪瑙の', '水晶の', '金剛の',
    '魔界の', '天界の', '冥界の', '仙界の', '妖界の', '霊界の', '幻界の', '異界の', '神界の', '魔界の',
    '絶対の', '無限の', '永遠の', '究極の', '至高の', '神々の', '魔王の', '勇者の', '賢者の', '戦士の',
    '伝説の', '神話の', '幻の', '夢の', '希望の', '運命の', '奇跡の', '神秘の', '魔法の', '呪術の',
    '破壊の', '創造の', '守護の', '解放の', '支配の', '統治の', '統率の', '統合の', '統御の', '統制の',
    '終焉の', '始原の', '起源の', '終末の', '黎明の', '黄昏の', '夜明けの', '日暮れの', '真夜中の', '正午の',
    '孤独の', '絆の', '愛の', '憎しみの', '喜びの', '悲しみの', '怒りの', '静寂の', '混沌の', '調和の',
    '鋼鉄の', '炎の', '氷の', '雷の', '風の', '土の', '水の', '火の', '木の', '金の',
    '闇夜の', '白昼の', '黄昏の', '夜明けの', '真夜中の', '正午の', '朝日の', '夕日の', '月の', '星の',
    '神殺しの', '魔王殺しの', '竜殺しの', '魔物殺しの', '悪魔殺しの', '天使殺しの', '死神殺しの', '勇者殺しの', '賢者殺しの', '戦士殺しの',
    '神の', '魔王の', '竜の', '魔物の', '悪魔の', '天使の', '死神の', '勇者の', '賢者の', '戦士の',
    '闇黒の', '光明の', '灼熱の', '極寒の', '轟雷の', '疾風の', '岩山の', '星雲の', '奈落の', '神聖の',
    '真紅の', '蒼藍の', '翠玉の', '琥珀の', '紫紺の', '翡翠の', '珊瑚の', '瑪瑙の', '水晶の', '金剛の',
    '魔界の', '天界の', '冥界の', '仙界の', '妖界の', '霊界の', '幻界の', '異界の', '神界の', '魔界の',
    '絶対の', '無限の', '永遠の', '究極の', '至高の', '神々の', '魔王の', '勇者の', '賢者の', '戦士の',
    '伝説の', '神話の', '幻の', '夢の', '希望の', '運命の', '奇跡の', '神秘の', '魔法の', '呪術の',
    '破壊の', '創造の', '守護の', '解放の', '支配の', '統治の', '統率の', '統合の', '統御の', '統制の',
    '終焉の', '始原の', '起源の', '終末の', '黎明の', '黄昏の', '夜明けの', '日暮れの', '真夜中の', '正午の',
    '孤独の', '絆の', '愛の', '憎しみの', '喜びの', '悲しみの', '怒りの', '静寂の', '混沌の', '調和の',
    '鋼鉄の', '炎の', '氷の', '雷の', '風の', '土の', '水の', '火の', '木の', '金の',
    '闇夜の', '白昼の', '黄昏の', '夜明けの', '真夜中の', '正午の', '朝日の', '夕日の', '月の', '星の',
    '神殺しの', '魔王殺しの', '竜殺しの', '魔物殺しの', '悪魔殺しの', '天使殺しの', '死神殺しの', '勇者殺しの', '賢者殺しの', '戦士殺しの',
    '神の', '魔王の', '竜の', '魔物の', '悪魔の', '天使の', '死神の', '勇者の', '賢者の', '戦士の'
];

$suffixes = [
    'フェニックス', 'ドラゴン', 'ウルフ', 'タイガー', 'イーグル', 'レイヴン', 'サーペント', 'ライオン', 'ホーク', 'ファルコン',
    'ブレード', 'ソード', 'アックス', 'スピア', 'アロー', 'シールド', 'アーマー', 'クローク', 'マント', 'ローブ',
    'マスター', 'ロード', 'キング', 'クイーン', 'プリンセス', 'プリンス', 'ナイト', 'ウォリアー', 'メイジ', 'ウィザード',
    'デーモン', 'エンジェル', 'ゴースト', 'スケルトン', 'ゾンビ', 'ヴァンパイア', 'ウェアウルフ', 'ミノタウロス', 'ケンタウロス', 'グリフォン',
    'ユニコーン', 'ペガサス', 'バジリスク', 'ヒドラ', 'キマイラ', 'スフィンクス', 'ハーピー', 'メデューサ', 'ミイラ', 'ゴーレム',
    'スレイヤー', 'ハンター', 'レンジャー', 'パラディン', 'クルセイダー', 'テンプラー', 'インクイジター', 'ジャッジ', 'エクスキューション', 'エクスキューター',
    'ソーサラー', 'ウィッチ', 'ネクロマンサー', 'サモナー', 'エンチャンター', 'イリュージョニスト', 'コンジャラー', 'エレメンタリスト', 'サイキック', 'テレパス',
    'アサシン', 'シーフ', 'ローグ', 'スパイ', 'スカウト', 'スナイパー', 'スパイダー', 'シャドウ', 'ゴースト', 'ファントム',
    'バーサーカー', 'グラディエーター', 'チャンピオン', 'ヒーロー', 'レジェンド', 'ミスティック', 'エンシェント', 'エターナル', 'インフィニット', 'アルティメット',
    'デストロイヤー', 'クリエイター', 'ガーディアン', 'プロテクター', 'ディフェンダー', 'サポーター', 'ヒーラー', 'セイバー', 'リベンジャー', 'アベンジャー',
    'エンペラー', 'カイザー', 'ツァー', 'シャー', 'スルタン', 'カリフ', 'ラージャ', 'マハラジャ', 'カーン', 'カガン',
    'オラクル', 'プロフェット', 'セイジ', 'ワイズマン', 'エルダー', 'メンター', 'ガイド', 'ティーチャー', 'マスター', 'グランドマスター',
    'アルケミスト', 'アーティザン', 'クラフツマン', 'スミス', 'フォージャー', 'エンジニア', 'メカニック', 'テクニシャン', 'アーティスト', 'クリエイター',
    'エクスプローラー', 'アドベンチャラー', 'トレジャーハンター', 'トレジャーシーカー', 'トレジャーファインダー', 'トレジャーディガー', 'トレジャーハンター', 'トレジャーシーカー', 'トレジャーファインダー', 'トレジャーディガー',
    'フェニックス', 'ドラゴン', 'ウルフ', 'タイガー', 'イーグル', 'レイヴン', 'サーペント', 'ライオン', 'ホーク', 'ファルコン',
    'ブレード', 'ソード', 'アックス', 'スピア', 'アロー', 'シールド', 'アーマー', 'クローク', 'マント', 'ローブ',
    'マスター', 'ロード', 'キング', 'クイーン', 'プリンセス', 'プリンス', 'ナイト', 'ウォリアー', 'メイジ', 'ウィザード',
    'デーモン', 'エンジェル', 'ゴースト', 'スケルトン', 'ゾンビ', 'ヴァンパイア', 'ウェアウルフ', 'ミノタウロス', 'ケンタウロス', 'グリフォン',
    'ユニコーン', 'ペガサス', 'バジリスク', 'ヒドラ', 'キマイラ', 'スフィンクス', 'ハーピー', 'メデューサ', 'ミイラ', 'ゴーレム',
    'スレイヤー', 'ハンター', 'レンジャー', 'パラディン', 'クルセイダー', 'テンプラー', 'インクイジター', 'ジャッジ', 'エクスキューション', 'エクスキューター',
    'ソーサラー', 'ウィッチ', 'ネクロマンサー', 'サモナー', 'エンチャンター', 'イリュージョニスト', 'コンジャラー', 'エレメンタリスト', 'サイキック', 'テレパス',
    'アサシン', 'シーフ', 'ローグ', 'スパイ', 'スカウト', 'スナイパー', 'スパイダー', 'シャドウ', 'ゴースト', 'ファントム',
    'バーサーカー', 'グラディエーター', 'チャンピオン', 'ヒーロー', 'レジェンド', 'ミスティック', 'エンシェント', 'エターナル', 'インフィニット', 'アルティメット',
    'デストロイヤー', 'クリエイター', 'ガーディアン', 'プロテクター', 'ディフェンダー', 'サポーター', 'ヒーラー', 'セイバー', 'リベンジャー', 'アベンジャー',
    'エンペラー', 'カイザー', 'ツァー', 'シャー', 'スルタン', 'カリフ', 'ラージャ', 'マハラジャ', 'カーン', 'カガン',
    'オラクル', 'プロフェット', 'セイジ', 'ワイズマン', 'エルダー', 'メンター', 'ガイド', 'ティーチャー', 'マスター', 'グランドマスター',
    'アルケミスト', 'アーティザン', 'クラフツマン', 'スミス', 'フォージャー', 'エンジニア', 'メカニック', 'テクニシャン', 'アーティスト', 'クリエイター',
    'エクスプローラー', 'アドベンチャラー', 'トレジャーハンター', 'トレジャーシーカー', 'トレジャーファインダー', 'トレジャーディガー', 'トレジャーハンター', 'トレジャーシーカー', 'トレジャーファインダー', 'トレジャーディガー'
];

$middleWords = [
    'オブ', 'イン', 'アット', 'フォー', 'ウィズ', 'フロム', 'トゥ', 'バイ', 'アンド', 'オア',
    '＝', '・', '×', '＋', '－', '／', '＼', '※', '☆', '★',
    '＝闇＝', '＝光＝', '＝炎＝', '＝氷＝', '＝雷＝', '＝風＝', '＝大地＝', '＝天空＝', '＝深淵＝', '＝聖＝',
    '＝漆黒＝', '＝白銀＝', '＝黄金＝', '＝翠緑＝', '＝紅蓮＝', '＝蒼穹＝', '＝紫電＝', '＝銀河＝', '＝混沌＝', '＝秩序＝',
    '＝絶対＝', '＝無限＝', '＝永遠＝', '＝究極＝', '＝至高＝', '＝神々＝', '＝魔王＝', '＝勇者＝', '＝賢者＝', '＝戦士＝',
    '＝伝説＝', '＝神話＝', '＝幻＝', '＝夢＝', '＝希望＝', '＝運命＝', '＝奇跡＝', '＝神秘＝', '＝魔法＝', '＝呪術＝',
    'オブ・ザ・', 'イン・ザ・', 'アット・ザ・', 'フォー・ザ・', 'ウィズ・ザ・', 'フロム・ザ・', 'トゥ・ザ・', 'バイ・ザ・', 'アンド・ザ・', 'オア・ザ・'
];

// POSTデータの取得とバリデーション
$originalName = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8') : '';
if (empty($originalName)) {
    header('Location: index.php');
    exit;
}

// 生成された名前を格納する配列
$generatedNames = [];

// 3つの名前を生成
for ($i = 0; $i < 3; $i++) {
    $prefix = $prefixes[array_rand($prefixes)];
    $suffix = $suffixes[array_rand($suffixes)];
    $middle = $middleWords[array_rand($middleWords)];
    
    // 名前の組み合わせパターンをランダムに選択
    $pattern = rand(1, 3);
    switch ($pattern) {
        case 1:
            $generatedName = $prefix . $originalName . $middle . $suffix;
            break;
        case 2:
            $generatedName = $suffix . $middle . $originalName;
            break;
        case 3:
            $generatedName = $originalName . $middle . $prefix . $suffix;
            break;
    }
    
    $generatedNames[] = $generatedName;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="icon" type="image/png" href="favicon.png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo $adsenseClient; ?>"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="✨ 闇堕ち超厨二ネーム ✨">
    <meta property="og:description" content="私の闇堕ち超厨二ネームは「<?php echo $generatedNames[0]; ?>」です！">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://ai.ayatabi.net/NameSummoner/NameSummoner.png">
    <meta property="og:url" content="https://ai.ayatabi.net/NameSummoner/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="https://ai.ayatabi.net/NameSummoner/NameSummoner.png">
    <title>✨ 闇堕ち超厨二ネーム ✨</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container result-container">
        <h1>✨ 闇堕ち超厨二ネーム ✨</h1>
        <div class="original-name">
            <p>元の名前：<?php echo $originalName; ?></p>
        </div>
        <div class="generated-names">
            <?php foreach ($generatedNames as $index => $name): ?>
                <div class="name-card">
                    <span class="name-number">その<?php echo $index + 1; ?></span>
                    <p class="generated-name"><?php echo $name; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="share-buttons">
            <a href="https://twitter.com/intent/tweet?text=私の闇堕ち超厨二ネームは「<?php echo urlencode($generatedNames[0]); ?>」です！&url=https://ai.ayatabi.net/NameSummoner/&via=ayatabi_net" class="share-btn twitter" target="_blank">
                <i class="fab fa-twitter"></i> Xでシェア
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://ai.ayatabi.net/NameSummoner/" class="share-btn facebook" target="_blank">
                <i class="fab fa-facebook"></i> Facebookでシェア
            </a>
        </div>
        <div class="back-button">
            <a href="index.php" class="btn">もう一度生成する</a>
        </div>
        <div class="ad-container">
            <div class="sponsored-header">
                <p>✨ スポンサーリンク ✨</p>
            </div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo $adsenseClient; ?>"
     crossorigin="anonymous"></script>
            <!-- NameSummoner -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="<?php echo $adsenseClient; ?>"
                 data-ad-slot="<?php echo $adsenseSlot; ?>"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</body>
</html> 