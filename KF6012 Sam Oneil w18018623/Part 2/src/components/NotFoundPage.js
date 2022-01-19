import React from "react";
import Footer from './Footer';

/**
 * Not Found Page Component
 * 
 * This component determines how the page looks like when the user tries to go to
 * a link that doesn't exist
 *  
 * @author Sam Oneil w18018623
 *  
 */

class NotFoundPage extends React.Component {
    render() {
        return (
            <div>
                <p>This page doesn't exist</p>
                <Footer />
            </div>
        )
    }
}

export default NotFoundPage;