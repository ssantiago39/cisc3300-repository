function hasPinecone(str) {
  if (str.includes("pinecone")) {
        return true;
  }
}
  
  const sentences = [
    "this is a wrong sentence",
    "this is the right sentence pinecone",
    "this is again a wrong sentence",
    "this is another wrong sentenc."
  ];
  
  const correctSentence = sentences.filter(hasPinecone);
  console.log(correctSentence);