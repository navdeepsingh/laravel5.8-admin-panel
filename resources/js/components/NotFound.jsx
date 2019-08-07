import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class NotFound extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <div className="container">
          <div className="row">
            <div className="col-md-12 text-center py-5">
              <h1>404: Page Not Found</h1>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    )
  }
}


export default NotFound;