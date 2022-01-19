import React from "react";
/**
 * Search box component
 * 
 * This component formats the input for the user to search
 *  
 * @author Sam Oneil w18018623
 *  
 */

class SearchBox extends React.Component {
    render() {
        return (
            <label class="search-box" >

                <input class="input-search" type='text' placeholder='Type to search...' value={this.props.search} onChange={this.props.handleSearch} />
            </label>
        )
    }
}

export default SearchBox;