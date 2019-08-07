import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Terms extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row py-3">
            <div className="col-md-12">
              <h2>Terms &amp; Condtions</h2>
              <h3>Brotzeit Oktoberfest Free Beer Campaign 2019</h3>
              <ol>
                <li>This offer is valid until 15th October 2019 only, unless otherwise stated. </li>
                <li>Offer is valid only with a minimum order of 1 menu item per redemption. </li>
                <li>Redemption is limited to 1 redemption per person on selected beers only, while stocks last. </li>
                <li>Redemption is valid solely in-person at any of Brotzeit’s outlets and for dine-in only:
                  <ul>
                    <li>Brotzeit Vivocity</li>
                    <li>Brotzeit Raffles City</li>
                    <li>Brotzeit Westgate</li>
                    <li>Brotzeit Katong</li>
                    <li>Brotzeit 313 Somerset</li>
                  </ul>
                </li>
                <li>This promotion is not valid with any other discounts, promotions, privilege cards or vouchers. The management reserves the rights to amend the terms and conditions without any prior notice.</li>
                <li>Brotzeit Pte Ltd reserves the right to request for proof of identification at point of redemption and reserves the sole and absolute right to disqualify any participant or reject participants deemed ineligible for the promotion (be it under these Terms & Conditions or has engaged in a conduct that the organiser considers inappropriate or unacceptable). </li>
                <li>Brotzeit Pte Ltd reserves the sole and absolute right to alter or end the offer at anytime, without giving prior notice or compensate in cash or in kind.</li>
              </ol>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Terms;