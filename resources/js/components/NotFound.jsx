import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';

class NotFound extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <h1>404: Page Not Found</h1>
        <Footer />
      </div>
    )
  }
}


export default NotFound;