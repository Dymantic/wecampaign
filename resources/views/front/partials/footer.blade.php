<footer class="bg-blue-darker pt-20 pb-4 px-8">
    <div class="flex flex-col md:flex-row justify-between pb-12 max-w-2xl mx-auto">
        <div class="md:w-1/3 mb-8">
            <p class="text-orange-soft text-2xl text-center md:text-left mb-4">Contact</p>
            <p class="text-sm text-center md:text-left text-blue-light">사업자등록번호: 718-87-01251</p>
            <p class="text-sm text-center md:text-left text-blue-light">문의메일: info@wecampaign.co.kr</p>
            <p class="text-sm text-center md:text-left text-blue-light">위캠페인 주식회사 l 대표자명 강지은</p>
            <p class="text-sm text-center md:text-left text-blue-light">서울 강남구 테헤란로 82길 15, 1887호</p>
        </div>
        <div class="md:w-1/3 mb-8">
            <p class="text-orange-soft text-2xl text-center mb-4">Quicklinks</p>
            <p class="text-center text-sm"><a href="/" class="text-blue-light hover:text-off-white no-underline">Home</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/services') }}" class="text-blue-light hover:text-off-white no-underline">Services</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/team') }}" class="text-blue-light hover:text-off-white no-underline">Team</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/contact') }}" class="text-blue-light hover:text-off-white no-underline">Contact</a></p>
        </div>
        <div class="md:w-1/3 mb-8">
            <p class="text-orange-soft text-2xl text-center md:text-right mb-4">Download</p>
            <img src="/images/appstore.svg"
                 alt="Logo for Apple App Store" height="40px" class="block mr-auto md:mr-0 ml-auto my-4">
            <img src="/images/googleplay.svg"
                 alt="Logo for Google Play Store" height="40px" class="block mr-auto md:mr-0 ml-auto my-4">
        </div>
    </div>
    <p class="text-center text-xs text-grey-dark">&copy; {{ (new DateTime)->format('Y') }}. All Rights Reserved. Brilliantly Built by
        <a href="https://dymanticdesign.com" class="text-grey-dark hover:text-orange-soft no-underline">Dymantic Design</a></p>
</footer>