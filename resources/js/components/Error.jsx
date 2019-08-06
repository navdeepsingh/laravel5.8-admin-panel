import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Error extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <h2>Error, You have already redeemed before.</h2>
              <p>Thanks for taking part.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Error;