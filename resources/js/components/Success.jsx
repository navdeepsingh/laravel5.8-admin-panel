import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class Success extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container success">
          <div className="row">
            <div className="col-md-12 text-center py-5">
              <h1>OKTOBERFEST 2019 <br />FREE BEER REDEMPTION</h1>
              <h2>Success!</h2>
              <p>Redemption successful.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div >
    )
  }
}


export default Success;