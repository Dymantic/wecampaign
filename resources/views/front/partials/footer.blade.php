<footer class="bg-blue-darker pt-20 pb-4 px-8">
    <div class="flex flex-col md:flex-row justify-between pb-12 max-w-2xl mx-auto">
        <div class="md:w-1/3 mb-8">
            <p class="text-purple text-2xl text-center md:text-left mb-4">Contact</p>
            <p class="text-sm text-center md:text-left text-off-white">사업자등록번호: 718-87-01251</p>
            <p class="text-sm text-center md:text-left text-off-white">문의메일: info@wecampaign.co.kr</p>
            <p class="text-sm text-center md:text-left text-off-white">위캠페인 주식회사 l 대표자명 강지은</p>
            <p class="text-sm text-center md:text-left text-off-white">서울 강남구 테헤란로 82길 15, 1887호</p>
        </div>
        <div class="md:w-1/3 mb-8">
            <p class="text-purple text-2xl text-center mb-4">Quicklinks</p>
            <p class="text-center text-sm"><a href="/" class="text-off-white hover:text-blue-light no-underline">Home</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/services') }}" class="text-off-white hover:text-blue-light no-underline">Services</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/team') }}" class="text-off-white hover:text-blue-light no-underline">Team</a></p>
            <p class="text-center text-sm"><a href="{{ localRoute('/contact') }}" class="text-off-white hover:text-blue-light no-underline">Contact</a></p>
        </div>
        <div class="md:w-1/3 mb-8">
            <p class="text-purple text-2xl text-center md:text-right mb-4">Download</p>
            <img src="/images/appstore.svg"
                 alt="Logo for Apple App Store" height="40px" class="block mr-auto md:mr-0 ml-auto my-4">
            <img src="/images/googleplay.svg"
                 alt="Logo for Google Play Store" height="40px" class="block mr-auto md:mr-0 ml-auto my-4">
        </div>
    </div>
    <p class="text-center text-xs text-grey-dark">&copy; {{ (new DateTime)->format('Y') }}. All Rights Reserved. Brilliantly Built by
        <a href="https://dymanticdesign.com" class="text-grey-dark hover:text-orange-soft no-underline">Dymantic Design</a></p>
</footer>