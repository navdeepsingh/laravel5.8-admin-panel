import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Error extends React.Component {
  render() {
    return (
      <div id="error-page">
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12 text-center py-5">
              <h2>You have previously submitted this form.</h2>
              <p>Kindly check your email for more details on how to redeem your free beer.</p>
              <p>Do not hesitate to email us at <a href="mailto:marketing@brotzeit.co">marketing@brotzeit.co</a> if you have any further enquiries.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Error;