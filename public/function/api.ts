import axios from "axios";

export async function addAuthorToBook(isdn: string, authorID: number)  {
    let apiurl = 'http://localhost:4000/api/book_author.php';
    try  {
        const response = await axios.post(apiurl, {
            isdn, authorID
        });
        console.log(response.data);
        return response.data;
    }  catch (error)  {
        console.error('Error: ', error);
        throw error;
    }
}