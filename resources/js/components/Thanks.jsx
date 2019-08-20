import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';
import config from './config';

class Thanks extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12 text-center py-5">

              <div className="row">
                <div className="col-md-12 text-center py-2">
                  <h2>Thank you!</h2>
                  <p>Please check your email for more details on how to redeem your free beer.</p>
                  <p>Do allow up to 15 minutes for our email to reach you. Remember to check your spam filters and add <a href="mailto:marketing@brotzeit.co">marketing@brotzeit.co</a> to your safe senders list.</p>
                  <p>Share the free drink with a friend!</p>
                  <ul className="list-inline social-links">
                    <li className="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Foktoberfest.brotzeit.co&amp;src=website" target="_blank"><i className="fa fa-facebook"></i></a></li>
                    <li className="list-inline-item"><a href={"https://twitter.com/intent/tweet?text=" + config.tweet}
                      rel="noopener" target="_blank"><i className="fa fa-twitter"></i></a></li>
                    <li className="list-inline-item"><a href={config.mail} target="_blank"><i className="fa fa-envelope"></i></a></li>
                  </ul>
                  <p className="pt-3 book-now"><h4>BOOK YOUR TABLE TODAY!</h4></p>
                  <a href="http://brotzeit.co/reservation/?utm_source=microsite&utm_medium=referral&utm_campaign=free_beer%20&utm_content=thankyou_page" target="_blank" className="btn btn-primary">BOOK NOW</a>
                  <p className="py-2"><a href="http://brotzeit.co/promotion/oktoberfest-2019/?utm_source=microsite&utm_medium=referral&utm_campaign=free_beer &utm_content=thankyou_page" target="_blank"><img src="./images/2019-08-14_Brotzeit_OktoBeerThankYou_MainHeader_RO.jpg" className="img-fluid" /></a></p>
                  <p className="py-2"><a href="http://brotzeit.co/promotion/oktoberfest-2019/?utm_source=microsite&utm_medium=referral&utm_campaign=free_beer%20&utm_content=thankyou_page" target="_blank"><img src="./images/2019-08-06_Brotzeit_OktoBeerCampaignThankYouPage_PromoBanner_RO.jpg" className="img-fluid" /></a></p>
                  <p>Click <a href="http://brotzeit.co/promotion/oktoberfest-2019/?utm_source=mailchimp&utm_medium=edm&utm_campaign=free_beer&utm_content=redemption_email" target="_blank">here</a> for more information on Oktoberfest Celebrations @ Brotzeit!</p>
                  <div className="text-center pt-5">
                    <p><strong>Follow us for more exclusive Oktoberfest deals!</strong></p>
                    <ul className="list-inline social-links">
                      <li className="list-inline-item"><a href="https://www.facebook.com/brotzeit.co/" target="_blank"><i className="fa fa-facebook"></i></a></li>
                      <li className="list-inline-item"><a href="https://www.instagram.com/brotzeit.sg/" target="_blank"><i className="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
        <Footer />
      </div >
    )
  }
}


export default Thanks;