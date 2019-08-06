import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Success extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <h2>Congrats, You have redeemed successfully.</h2>
              <p>Enjoy your beer.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Success;