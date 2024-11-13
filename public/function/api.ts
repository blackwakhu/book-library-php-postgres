const axios = require('axios');

module.exports = {
  addAuthorToBook: async function (isdn: number, authorId: number): Promise<any> {
    const apiUrl = 'http://localhost:4000/api/book_author.php';

    try {
      const response = await axios.post(apiUrl, {
        isdn,
        authorId
      });

      return response.data;
    } catch (error) {
      console.error('Error:', error);
      throw error;
    }
  }
};