import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Thanks extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <h2>Thanks for Submission</h2>
              <p>You will get email shortly</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Thanks;