<footer class="footer footer-panel">
    <div class="container">
        <div class="row footer-row">
            <div class="col-12">
                <h5 class="footer-title">這裡是農會相關資訊喔!</h5>
                <ul class="footer-information">
                    @foreach($FooterList as $FooterLists)
                        <li>電話：{{$FooterLists->phone}}</li>
                        <li>地址：{{$FooterLists->address}}</li>
                        <li>製作年份：{{$FooterLists->ProductionYear}}</li>
                        <li>協助單位：{{$FooterLists->AssistingUnit}}</li>
                        <li>提供單位：{{$FooterLists->ProvidingUnit}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row footer-bottom">
        <div class="col-12" style="padding: 0;">
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
            </div>
        </div>
    </div>
</footer>