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
            <div className="col-md-12 text-center py-5">
              <h1>OKTOBERFEST 2019 FREE BEER<br></br>STAFF REDEMPTION</h1>
              <p><strong>Success!</strong></p>
              <p>Redemption successful.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default Success;