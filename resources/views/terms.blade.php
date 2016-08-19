@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/form.css") }}">

@stop


@section('content')

    <div class="page-content">

        <div class="container">

            <div class="maia-article" role="article">
                <div class="maia-teleport" id="content"></div>
                <h1 class="page-header">เงื่อนไขและข้อกำหนด</h1>

                </p><h2>Welcome to Google!</h2>
                <p>Thanks for using our products and services (“Services”). The Services are provided by Google Inc. (“Google”), located at 1600 Amphitheatre Parkway, Mountain View, CA 94043, United States.
                </p><p>By using our Services, you are agreeing to these terms. Please read them carefully.
                </p><p>Our Services are very diverse, so sometimes additional terms or product requirements (including age requirements) may apply. Additional terms will be available with the relevant Services and those additional terms become part of your agreement with us if you use those Services.
                </p><h2 id="toc-services">Using our Services</h2>
                <p>You must follow any policies made available to you within the Services.
                </p><p>Do not misuse our Services, for example, do not interfere with our Services or try to access them using a method other than the interface and the instructions that we provide. You may use our Services only as permitted by law, including applicable export and control laws and regulations. We may suspend or stop providing our Services to you if you do not comply with our terms or policies or if we are investigating suspected misconduct.
                </p><p>Using our Services does not give you ownership of any intellectual property rights in our Services or the content that you access. You may not use content from our Services unless you obtain permission from its owner or are otherwise permitted by law. These terms do not grant you the right to use any branding or logos used in our Services. Do not remove, obscure or alter any legal notices displayed in or along with our Services.
                </p><p>Our Services display some content that is not Google’s. This content is the sole responsibility of the entity that makes it available. We may review content to determine whether it is illegal or violates our policies, and we may remove or refuse to display content that we reasonably believe violates our policies or the law. But that does not necessarily mean that we review content, so please do not assume that we do.
                </p><p>In connection with your use of the Services, we may send you service announcements, administrative messages and other information. You may opt out of some of those communications.
                </p><p>Some of our Services are available on mobile devices. Do not use such Services in a way that distracts you and prevents you from obeying traffic or safety laws.
                </p><h2 id="toc-account">Your Google Account</h2>
                <p>You may need a Google Account in order to use some of our Services. You may create your own Google Account, or your Google Account may be assigned to you by an administrator, such as your employer or educational institution. If you are using a Google Account assigned to you by an administrator, different or additional terms may apply, and your administrator may be able to access or disable your account.
                </p><p>To protect your Google Account, keep your password confidential. You are responsible for the activity that happens on or through your Google Account. Try not to reuse your Google Account password on third-party applications. If you learn of any unauthorised use of your password or Google Account, <a href="http://support.google.com/accounts/bin/answer.py?hl=en-GB&amp;answer=58585">follow these instructions</a>.
                </p><h2 id="toc-protection">Privacy and Copyright Protection</h2>
                <p>Google’s <a href="../../policies/privacy/">Privacy Policies</a> explain how we treat your personal data and protect your privacy when you use our Services. By using our Services, you agree that Google can use such data in accordance with our Privacy Policies.
                </p><p>We respond to notices of alleged copyright infringement and terminate accounts of repeat infringers according to the process set out in the US Digital Millennium Copyright Act.
                </p><p>We provide information to help copyright holders manage their intellectual property online. If you think that somebody is violating your copyright and want to notify us, you can find information about submitting notices and Google’s policy about responding to notices <a href="http://support.google.com/bin/static.py?hl=en-GB&amp;ts=1114905&amp;page=ts.cs">in our Help Centre</a>.
                </p><h2 id="toc-content">Your Content in our Services</h2>
                <p>Some of our Services allow you to upload, submit, store, send or receive content You retain ownership of any intellectual property rights that you hold in that content. In short, what belongs to you stays yours.
                </p><p>When you upload, submit, store, send or receive content to or through our Services, you give Google (and those we work with) a worldwide licence to use, host, store, reproduce, modify, create derivative works (such as those resulting from translations, adaptations or other changes that we make so that your content works better with our Services), communicate, publish, publicly perform, publicly display and distribute such content. The rights that you grant in this licence are for the limited purpose of operating, promoting and improving our Services, and to develop new ones. This licence continues even if you stop using our Services (for example, for a business listing that you have added to Google Maps). Some Services may offer you ways to access and remove content that has been provided to that Service. Also, in some of our Services, there are terms or settings that narrow the scope of our use of the content submitted in those Services. Make sure that you have the necessary rights to grant us this licence for any content that you submit to our Services.
                </p><p>Our automated systems analyse your content (including emails) to provide you with personally relevant product features, such as customised search results, tailored advertising and spam and malware detection. This analysis occurs as the content is sent, received and when it is stored.
                </p><p>If you have a Google Account, we may display your Profile name, Profile photo and actions you take on Google or on third-party applications connected to your Google Account (such as +1’s, reviews you write and comments you post) in our Services, including displaying in ads and other commercial contexts. We will respect the choices you make to limit sharing or visibility settings in your Google Account. For example, you can choose your settings so that your name and photo do not appear in an ad.
                </p><p>You can find more information about how Google uses and stores content in the Privacy Policy or additional terms for particular Services. If you submit feedback or suggestions about our Services, we may use your feedback or suggestions without obligation to you.
                </p><h2 id="toc-software">About Software in our Services</h2>
                <p>When a Service requires or includes downloadable software, this software may be updated automatically on your device once a new version or feature is available. Some Services may let you adjust your automatic update settings.
                </p><p>Google gives you a personal, worldwide, royalty-free, non-assignable and non-exclusive licence to use the software provided to you by Google as part of the Services. This licence is for the sole purpose of enabling you to use and enjoy the benefit of the Services as provided by Google in the manner permitted by these terms. You may not copy, modify, distribute, sell or lease any part of our Services or included software, nor may you reverse engineer or attempt to extract the source code of that software, unless laws prohibit those restrictions or you have our written permission.
                </p><p>Open-source software is important to us. Some software used in our Services may be offered under an open-source licence that we will make available to you. There may be provisions in the open-source licence that expressly override some of these terms.
                </p><h2 id="toc-modification">Modifying and Terminating our Services</h2>
                <p>We are constantly changing and improving our Services. We may add or remove functionalities or features and we may suspend or stop a Service altogether.
                </p><p>You can stop using our Services at any time, although we would be sorry to see you go. Google may also stop providing Services to you or add or create new limits to our Services at any time.
                </p><p>We believe that you own your data, and preserving your access to such data is important. If we discontinue a Service, where reasonably possible, we will give you reasonable advance notice and a chance to remove information from that Service.
                </p><h2 id="toc-warranties-disclaimers">Our Warranties and Disclaimers</h2>
                <p>We provide our Services using a commercially reasonable level of skill and care and we hope that you will enjoy using them. But there are certain things that we do not promise about our Services.
                </p><p>Other than as expressly set out in these terms or additional terms, neither Google nor its suppliers or distributors makes any specific promises about the Services. For example, we do not make any commitments about the content within the Services, the specific functions of the Services or their reliability, availability or ability to meet your needs. We provide the Services “as is”.
                </p><p>Some jurisdictions provide for certain warranties, like the implied warranty of merchantability, fitness for a particular purpose and non-infringement. To the extent permitted by law, we exclude all warranties.
                </p><h2 id="toc-liability">Liability for our Services</h2>
                <p>When permitted by law, Google and Google’s suppliers and distributors will not be responsible for lost profits, revenues or data, financial losses or indirect, special, consequential, exemplary or punitive damages.
                </p><p>To the extent permitted by law, the total liability of Google and its suppliers and distributors for any claims under these terms, including for any implied warranties, is limited to the amount that you paid us to use the Services (or, if we choose, to supplying you with the Services again).
                </p><p>In all cases, Google and its suppliers and distributors will not be liable for any loss or damage that is not reasonably foreseeable.
                </p><p>We recognise that in some countries, you might have legal rights as a consumer. If you are using the Services for a personal purpose, then nothing in these terms or any additional terms limits any consumers’ legal rights which may not be waived by contract.
                </p><h2 id="toc-business-uses">Business uses of our Services</h2>
                <p>If you are using our Services on behalf of a business, that business accepts these terms. It will hold harmless and indemnify Google and its affiliates, officers, agents and employees from any claim, action or proceedings arising from or related to the use of the Services or violation of these terms, including any liability or expense arising from claims, losses, damages, judgements, litigation costs and legal fees.
                </p><h2 id="toc-about">About these Terms</h2>
                <p>We may modify these terms or any additional terms that apply to a Service to, for example, reflect changes to the law or changes to our Services. You should look at the terms regularly. We’ll post notice of modifications to these terms on this page. We’ll post notice of modified additional terms in the applicable Service. Changes will not apply retrospectively and will become effective no earlier than fourteen days after they are posted. However, changes addressing new functions for a Service or changes made for legal reasons will be effective immediately. If you do not agree to the modified terms for a Service, you should discontinue your use of that Service.
                </p><p>If there is any inconsistency between these terms and the additional terms, the additional terms will prevail to the extent of the inconsistency.
                </p><p>These terms govern the relationship between Google and you. They do not create any third party beneficiary rights.
                </p><p>If you do not comply with these terms and we do not take action immediately, this doesn’t mean that we are giving up any rights that we may have (such as taking action in the future).
                </p><p>If it turns out that a particular term is not enforceable, this will not affect any other terms.
                </p><p>The courts in some countries will not apply Californian law to some types of disputes. If you reside in one of those countries, then where Californian law is excluded from applying, your country’s laws will apply to such disputes related to these terms. Otherwise, you agree that the laws of California, USA, excluding California’s choice of law rules, will apply to any disputes arising out of or relating to these terms or the Services. Similarly, if the courts in your country will not permit you to consent to the jurisdiction and venue of the courts in Santa Clara County, California, USA, then your local jurisdiction and venue will apply to such disputes related to these terms. Otherwise, all claims arising out of or relating to these terms or the services will be litigated exclusively in the federal or state courts of Santa Clara County, California, USA, and you and Google consent to personal jurisdiction in those courts.
                </p><p>For information about how to contact Google, please visit our <a href="../../contact/">contact page</a>.</p></div>

        </div>

    </div>

@stop




